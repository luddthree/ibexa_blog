<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Core\IO\IOMetadataHandler;

use DateTime;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Ibexa\Contracts\Core\IO\BinaryFile as SPIBinaryFile;
use Ibexa\Contracts\Core\IO\BinaryFileCreateStruct as SPIBinaryFileCreateStruct;
use Ibexa\Core\Base\Exceptions\InvalidArgumentException;
use Ibexa\Core\IO\Exception\BinaryFileNotFoundException;
use Ibexa\Core\IO\IOMetadataHandler;
use Ibexa\Core\IO\UrlDecorator;

/**
 * Manages IO metadata in a mysql table, ezdfsfile.
 *
 * It will prevent simultaneous writes to the same file.
 */
class LegacyDFSCluster implements IOMetadataHandler
{
    /** @var \Doctrine\DBAL\Connection */
    private $db;

    /** @var \Ibexa\Core\IO\UrlDecorator */
    private $urlDecorator;

    /**
     * @param \Doctrine\DBAL\Connection $connection Doctrine DBAL connection
     * @param \Ibexa\Core\IO\UrlDecorator $urlDecorator The URL decorator used to add a prefix to files path
     */
    public function __construct(Connection $connection, UrlDecorator $urlDecorator = null)
    {
        $this->db = $connection;
        $this->urlDecorator = $urlDecorator;
    }

    /**
     * Inserts a new reference to file $spiBinaryFileId.
     *
     * @since 6.10 The mtime of the $binaryFileCreateStruct must be a DateTime, as specified in the struct doc.
     *
     * @param \Ibexa\Contracts\Core\IO\BinaryFileCreateStruct $binaryFileCreateStruct
     *
     * @throws \Ibexa\Core\Base\Exceptions\InvalidArgumentException if the $binaryFileCreateStruct is invalid
     * @throws \RuntimeException if a DBAL error occurs
     *
     * @return \Ibexa\Contracts\Core\IO\BinaryFile
     */
    public function create(SPIBinaryFileCreateStruct $binaryFileCreateStruct)
    {
        if (!($binaryFileCreateStruct->mtime instanceof DateTime)) {
            throw new InvalidArgumentException('$binaryFileCreateStruct', 'Property \'mtime\' must be a DateTime');
        }

        $path = (string)$this->addPrefix($binaryFileCreateStruct->id);
        $params = [
            'name' => $path,
            'name_hash' => md5($path),
            'name_trunk' => $this->getNameTrunk($binaryFileCreateStruct),
            'mtime' => $binaryFileCreateStruct->mtime->getTimestamp(),
            'size' => $binaryFileCreateStruct->size,
            'scope' => $this->getScope($binaryFileCreateStruct),
            'datatype' => $binaryFileCreateStruct->mimeType,
        ];

        try {
            $this->db->insert('ezdfsfile', $params);
        } catch (Exception $e) {
            $this->db->update('ezdfsfile', [
                'mtime' => $params['mtime'],
                'size' => $params['size'],
                'scope' => $params['scope'],
                'datatype' => $params['datatype'],
            ], [
                'name_hash' => $params['name_hash'],
            ]);
        }

        return $this->mapSPIBinaryFileCreateStructToSPIBinaryFile($binaryFileCreateStruct);
    }

    /**
     * Deletes file $spiBinaryFileId.
     *
     * @throws \Ibexa\Core\IO\Exception\BinaryFileNotFoundException If $spiBinaryFileId is not found
     *
     * @param string $spiBinaryFileId
     */
    public function delete($spiBinaryFileId)
    {
        $path = (string)$this->addPrefix($spiBinaryFileId);

        // Unlike the legacy cluster, the file is directly deleted. It was inherited from the DB cluster anyway
        $affectedRows = (int)$this->db->delete('ezdfsfile', [
            'name_hash' => md5($path),
        ]);

        if ($affectedRows !== 1) {
            // Is this really necessary ?
            throw new BinaryFileNotFoundException($path);
        }
    }

    /**
     * Loads and returns metadata for $spiBinaryFileId.
     *
     * @param string $spiBinaryFileId
     *
     * @return \Ibexa\Contracts\Core\IO\BinaryFile
     *
     * @throws \Ibexa\Core\IO\Exception\BinaryFileNotFoundException if no row is found for $spiBinaryFileId
     * @throws \Doctrine\DBAL\DBALException Any unhandled DBAL exception
     */
    public function load($spiBinaryFileId)
    {
        $path = (string)$this->addPrefix($spiBinaryFileId);

        $queryBuilder = $this->db->createQueryBuilder();
        $result = $queryBuilder
            ->select(
                'e.name_hash',
                'e.name',
                'e.name_trunk',
                'e.datatype',
                'e.scope',
                'e.size',
                'e.mtime',
                'e.expired',
                'e.status',
            )
            ->from('ezdfsfile', 'e')
            ->andWhere('e.name_hash = :name_hash')
            ->andWhere('e.expired != true')
            ->andWhere('e.mtime > 0')
            ->setParameter('name_hash', md5($path))
            ->execute()
        ;

        if ($result->rowCount() === 0) {
            throw new BinaryFileNotFoundException($path);
        }

        $row = $result->fetchAssociative() + ['id' => $spiBinaryFileId];

        return $this->mapArrayToSPIBinaryFile($row);
    }

    /**
     * Checks if a file $spiBinaryFileId exists.
     *
     * @param string $spiBinaryFileId
     *
     * @throws \Ibexa\Core\Base\Exceptions\NotFoundException
     * @throws \Doctrine\DBAL\DBALException Any unhandled DBAL exception
     *
     * @return bool
     */
    public function exists($spiBinaryFileId)
    {
        $path = (string)$this->addPrefix($spiBinaryFileId);

        $queryBuilder = $this->db->createQueryBuilder();
        $result = $queryBuilder
            ->select(
                'e.name_hash',
                'e.name',
                'e.name_trunk',
                'e.datatype',
                'e.scope',
                'e.size',
                'e.mtime',
                'e.expired',
                'e.status',
            )
            ->from('ezdfsfile', 'e')
            ->andWhere('e.name_hash = :name_hash')
            ->andWhere('e.expired != true')
            ->andWhere('e.mtime > 0')
            ->setParameter('name_hash', md5($path))
            ->execute()
        ;

        return $result->rowCount() === 1;
    }

    /**
     * @param \Ibexa\Contracts\Core\IO\BinaryFileCreateStruct $binaryFileCreateStruct
     *
     * @return mixed
     */
    protected function getNameTrunk(SPIBinaryFileCreateStruct $binaryFileCreateStruct)
    {
        return $this->addPrefix($binaryFileCreateStruct->id);
    }

    /**
     * Returns the value for the scope meta field, based on the created file's path.
     *
     * Note that this is slightly incorrect, as it will return binaryfile for media files as well. It is a bit
     * of an issue, but shouldn't be a blocker given that this meta field isn't used that much.
     *
     * @param \Ibexa\Contracts\Core\IO\BinaryFileCreateStruct $binaryFileCreateStruct
     *
     * @return string
     */
    protected function getScope(SPIBinaryFileCreateStruct $binaryFileCreateStruct)
    {
        [$filePrefix] = explode('/', $binaryFileCreateStruct->id);

        switch ($filePrefix) {
            case 'images':
                return 'image';

            case 'original':
                return 'binaryfile';
        }

        return 'UNKNOWN_SCOPE';
    }

    /**
     * Adds the internal prefix string to $id.
     *
     * @param string $id
     *
     * @return string prefixed id
     */
    protected function addPrefix($id)
    {
        return isset($this->urlDecorator) ? $this->urlDecorator->decorate($id) : $id;
    }

    /**
     * Removes the internal prefix string from $prefixedId.
     *
     * @param string $prefixedId
     *
     * @return string the id without the prefix
     *
     * @throws \Ibexa\Core\IO\Exception\InvalidBinaryFileIdException if the prefix isn't found in $prefixedId
     */
    protected function removePrefix($prefixedId)
    {
        return isset($this->urlDecorator) ? $this->urlDecorator->undecorate($prefixedId) : $prefixedId;
    }

    public function getMimeType($spiBinaryFileId)
    {
        $queryBuilder = $this->db->createQueryBuilder();
        $result = $queryBuilder
            ->select('e.datatype')
            ->from('ezdfsfile', 'e')
            ->andWhere('e.name_hash = :name_hash')
            ->andWhere('e.expired != true')
            ->andWhere('e.mtime > 0')
            ->setParameter('name_hash', md5($this->addPrefix($spiBinaryFileId)))
            ->execute()
        ;

        if ($result->rowCount() == 0) {
            throw new BinaryFileNotFoundException($spiBinaryFileId);
        }

        $row = $result->fetchAssociative();

        return $row['datatype'];
    }

    /**
     * Delete directory and all the content under specified directory.
     *
     * @param string $spiPath SPI Path, not prefixed by URL decoration
     */
    public function deleteDirectory($spiPath)
    {
        $query = $this->db->createQueryBuilder();
        $query
            ->delete('ezdfsfile')
            ->where('name LIKE :spiPath ESCAPE :esc')
            ->setParameter(':esc', '\\')
            ->setParameter(
                ':spiPath',
                addcslashes($this->addPrefix(rtrim($spiPath, '/')), '%_') . '/%'
            );
        $query->execute();
    }

    /**
     * Maps an array of data base properties (id, size, mtime, datatype, md5_path, path...) to an SPIBinaryFile object.
     *
     * @param array $properties database properties array
     *
     * @return \Ibexa\Contracts\Core\IO\BinaryFile
     */
    protected function mapArrayToSPIBinaryFile(array $properties)
    {
        $spiBinaryFile = new SPIBinaryFile();
        $spiBinaryFile->id = $properties['id'];
        $spiBinaryFile->size = $properties['size'];
        $spiBinaryFile->mtime = new DateTime('@' . $properties['mtime']);
        $spiBinaryFile->mimeType = $properties['datatype'];

        return $spiBinaryFile;
    }

    /**
     * @param \Ibexa\Contracts\Core\IO\BinaryFileCreateStruct $binaryFileCreateStruct
     *
     * @return \Ibexa\Contracts\Core\IO\BinaryFile
     */
    protected function mapSPIBinaryFileCreateStructToSPIBinaryFile(SPIBinaryFileCreateStruct $binaryFileCreateStruct)
    {
        $spiBinaryFile = new SPIBinaryFile();
        $spiBinaryFile->id = $binaryFileCreateStruct->id;
        $spiBinaryFile->mtime = $binaryFileCreateStruct->mtime;
        $spiBinaryFile->size = $binaryFileCreateStruct->size;
        $spiBinaryFile->mimeType = $binaryFileCreateStruct->mimeType;

        return $spiBinaryFile;
    }
}
