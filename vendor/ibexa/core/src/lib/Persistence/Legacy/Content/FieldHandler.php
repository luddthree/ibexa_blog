<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Core\Persistence\Legacy\Content;

use Ibexa\Contracts\Core\Persistence\Content;
use Ibexa\Contracts\Core\Persistence\Content\Field;
use Ibexa\Contracts\Core\Persistence\Content\Language\Handler as LanguageHandler;
use Ibexa\Contracts\Core\Persistence\Content\Type;
use Ibexa\Contracts\Core\Persistence\Content\Type\FieldDefinition;
use Ibexa\Contracts\Core\Persistence\Content\UpdateStruct;
use Ibexa\Contracts\Core\Persistence\Content\VersionInfo;
use Ibexa\Core\Persistence\FieldTypeRegistry;

/**
 * Field Handler.
 */
class FieldHandler
{
    /**
     * Content Gateway.
     *
     * @var \Ibexa\Core\Persistence\Legacy\Content\Gateway
     */
    protected $contentGateway;

    /** @var \Ibexa\Core\Persistence\Legacy\Content\Language\Handler */
    protected $languageHandler;

    /**
     * Content Mapper.
     *
     * @var \Ibexa\Core\Persistence\Legacy\Content\Mapper
     */
    protected $mapper;

    /**
     * Storage Handler.
     *
     * @var \Ibexa\Core\Persistence\Legacy\Content\StorageHandler
     */
    protected $storageHandler;

    /**
     * FieldType registry.
     *
     * @var \Ibexa\Core\Persistence\FieldTypeRegistry
     */
    protected $fieldTypeRegistry;

    /**
     * Hash of SPI FieldTypes or callable callbacks to generate one.
     *
     * @var array
     */
    protected $fieldTypes;

    /**
     * Creates a new Field Handler.
     *
     * @param \Ibexa\Core\Persistence\Legacy\Content\Gateway $contentGateway
     * @param \Ibexa\Core\Persistence\Legacy\Content\Mapper $mapper
     * @param \Ibexa\Core\Persistence\Legacy\Content\StorageHandler $storageHandler
     * @param \Ibexa\Contracts\Core\Persistence\Content\Language\Handler $languageHandler
     * @param \Ibexa\Core\Persistence\FieldTypeRegistry $fieldTypeRegistry
     */
    public function __construct(
        Gateway $contentGateway,
        Mapper $mapper,
        StorageHandler $storageHandler,
        LanguageHandler $languageHandler,
        FieldTypeRegistry $fieldTypeRegistry
    ) {
        $this->contentGateway = $contentGateway;
        $this->mapper = $mapper;
        $this->storageHandler = $storageHandler;
        $this->languageHandler = $languageHandler;
        $this->fieldTypeRegistry = $fieldTypeRegistry;
    }

    /**
     * Creates new fields in the database from $content of $contentType.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     * @param \Ibexa\Contracts\Core\Persistence\Content\Type $contentType
     */
    public function createNewFields(Content $content, Type $contentType)
    {
        $fieldsToCopy = [];
        $languageCodes = [];
        $fields = $this->getFieldMap($content->fields, $languageCodes);
        $languageCodes[$content->versionInfo->contentInfo->mainLanguageCode] = true;

        foreach ($contentType->fieldDefinitions as $fieldDefinition) {
            foreach (array_keys($languageCodes) as $languageCode) {
                // Create fields passed from struct
                if (isset($fields[$fieldDefinition->id][$languageCode])) {
                    $field = $fields[$fieldDefinition->id][$languageCode];
                    $this->createNewField($field, $content);
                } elseif (
                    !$fieldDefinition->isTranslatable
                    && isset($fields[$fieldDefinition->id][$content->versionInfo->contentInfo->mainLanguageCode])
                ) {
                    // Copy only for untranslatable field and when field in main language exists
                    // Only register here, process later as field copied should be already stored
                    $fieldsToCopy[$fieldDefinition->id][$languageCode] =
                        $fields[$fieldDefinition->id][$content->versionInfo->contentInfo->mainLanguageCode];
                } else { // In all other cases create empty field
                    $field = $this->getEmptyField($fieldDefinition, $languageCode);
                    $content->fields[] = $field;
                    $this->createNewField($field, $content);
                }
            }
        }

        $this->copyFields($fieldsToCopy, $content);
    }

    /**
     * Returns empty Field object for given field definition and language code.
     *
     * Uses FieldType to create empty field value.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Type\FieldDefinition $fieldDefinition
     * @param string $languageCode
     *
     * @return \Ibexa\Contracts\Core\Persistence\Content\Field
     */
    protected function getEmptyField(FieldDefinition $fieldDefinition, $languageCode)
    {
        $fieldType = $this->fieldTypeRegistry->getFieldType($fieldDefinition->fieldType);

        return new Field(
            [
                'fieldDefinitionId' => $fieldDefinition->id,
                'type' => $fieldDefinition->fieldType,
                'value' => $fieldType->getEmptyValue(),
                'languageCode' => $languageCode,
            ]
        );
    }

    /**
     * Creates existing fields in a new version for $content.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    public function createExistingFieldsInNewVersion(Content $content): void
    {
        foreach ($content->fields as $field) {
            if ($field->id === null) {
                // Virtual field with default value, skip creating field as it has no id
                continue;
            }
            $this->createExistingFieldInNewVersion($field, $content);
        }
    }

    /**
     * Creates a new field in the database.
     *
     * Used by self::createNewFields() and self::updateFields()
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $field
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function createNewField(Field $field, Content $content)
    {
        $field->versionNo = $content->versionInfo->versionNo;

        $field->id = $this->contentGateway->insertNewField(
            $content,
            $field,
            $this->mapper->convertToStorageValue($field)
        );

        // If the storage handler returns true, it means that $field value has been modified
        // So we need to update it in order to store those modifications
        // Field converter is called once again via the Mapper
        if ($this->storageHandler->storeFieldData($content->versionInfo, $field) === true) {
            $this->contentGateway->updateField(
                $field,
                $this->mapper->convertToStorageValue($field)
            );
        }
    }

    /**
     * @param array $fields
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function copyFields(array $fields, Content $content)
    {
        foreach ($fields as $languageFields) {
            foreach ($languageFields as $languageCode => $field) {
                $this->copyField($field, $languageCode, $content);
            }
        }
    }

    /**
     * Copies existing field to new field for given $languageCode.
     *
     * Used by self::createNewFields() and self::updateFields()
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $originalField
     * @param string $languageCode
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function copyField(Field $originalField, $languageCode, Content $content)
    {
        $originalField->versionNo = $content->versionInfo->versionNo;
        $field = clone $originalField;
        $field->languageCode = $languageCode;

        $field->id = $this->contentGateway->insertNewField(
            $content,
            $field,
            $this->mapper->convertToStorageValue($field)
        );

        // If the storage handler returns true, it means that $field value has been modified
        // So we need to update it in order to store those modifications
        // Field converter is called once again via the Mapper
        if ($this->storageHandler->copyFieldData($content->versionInfo, $field, $originalField) === true) {
            $this->contentGateway->updateField(
                $field,
                $this->mapper->convertToStorageValue($field)
            );
        }

        $content->fields[] = $field;
    }

    /**
     * Updates an existing field in the database.
     *
     * Used by self::createNewFields() and self::updateFields()
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $field
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function updateField(Field $field, Content $content)
    {
        $this->contentGateway->updateField(
            $field,
            $this->mapper->convertToStorageValue($field)
        );

        // If the storage handler returns true, it means that $field value has been modified
        // So we need to update it in order to store those modifications
        // Field converter is called once again via the Mapper
        if ($this->storageHandler->storeFieldData($content->versionInfo, $field) === true) {
            $this->contentGateway->updateField(
                $field,
                $this->mapper->convertToStorageValue($field)
            );
        }
    }

    /**
     * Creates an existing field in a new version, no new ID is generated.
     *
     * Used to insert a field with an existing ID but a new version number.
     * $content is used for new version data, needed by Content gateway and external storage.
     *
     * External data is being copied here as some FieldTypes require original field external data.
     * By default copying falls back to storing, it is upon external storage implementation to override
     * the behaviour as needed.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $field
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function createExistingFieldInNewVersion(Field $field, Content $content)
    {
        $originalField = clone $field;
        $field->versionNo = $content->versionInfo->versionNo;

        $this->contentGateway->insertExistingField(
            $content,
            $field,
            $this->mapper->convertToStorageValue($field)
        );

        // If the storage handler returns true, it means that $field value has been modified
        // So we need to update it in order to store those modifications
        // Field converter is called once again via the Mapper
        if ($this->storageHandler->copyFieldData($content->versionInfo, $field, $originalField) === true) {
            $this->contentGateway->updateField(
                $field,
                $this->mapper->convertToStorageValue($field)
            );
        }
    }

    /**
     * Performs external loads for the fields in $content.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    public function loadExternalFieldData(Content $content)
    {
        foreach ($content->fields as $field) {
            $this->storageHandler->getFieldData($content->versionInfo, $field);
        }
    }

    /**
     * Updates the fields in for content identified by $contentId and $versionNo in the database in respect to $updateStruct.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     * @param \Ibexa\Contracts\Core\Persistence\Content\UpdateStruct $updateStruct
     * @param \Ibexa\Contracts\Core\Persistence\Content\Type $contentType
     */
    public function updateFields(Content $content, UpdateStruct $updateStruct, Type $contentType)
    {
        $updatedFields = [];
        $fieldsToCopy = [];
        $nonTranslatableCopiesUpdateSet = [];
        $mainLanguageCode = $content->versionInfo->contentInfo->mainLanguageCode;
        $languageCodes = $existingLanguageCodes = array_fill_keys($content->versionInfo->languageCodes, true);
        $contentFieldMap = $this->getFieldMap($content->fields);
        $updateFieldMap = $this->getFieldMap($updateStruct->fields, $languageCodes);
        $initialLanguageCode = $this->languageHandler->load($updateStruct->initialLanguageId)->languageCode;
        $languageCodes[$initialLanguageCode] = true;

        foreach ($contentType->fieldDefinitions as $fieldDefinition) {
            foreach (array_keys($languageCodes) as $languageCode) {
                if (isset($updateFieldMap[$fieldDefinition->id][$languageCode])) {
                    $field = clone $updateFieldMap[$fieldDefinition->id][$languageCode];
                    $field->versionNo = $content->versionInfo->versionNo;
                    if (isset($field->id) && array_key_exists($field->languageCode, $existingLanguageCodes)) {
                        $this->updateField($field, $content);
                        $updatedFields[$fieldDefinition->id][$languageCode] = $field;
                    } else {
                        $this->createNewField($field, $content);
                    }
                } elseif (!isset($existingLanguageCodes[$languageCode])) {
                    // If field is not set for new language
                    if ($fieldDefinition->isTranslatable) {
                        // Use empty value for translatable field
                        $field = $this->getEmptyField($fieldDefinition, $languageCode);
                        $this->createNewField($field, $content);
                    } else {
                        // Use value from main language code for untranslatable field
                        $fieldsToCopy[$fieldDefinition->id][$languageCode] =
                            isset($updateFieldMap[$fieldDefinition->id][$mainLanguageCode])
                                ? $updateFieldMap[$fieldDefinition->id][$mainLanguageCode]
                                : $contentFieldMap[$fieldDefinition->id][$mainLanguageCode];
                    }
                } elseif (!$fieldDefinition->isTranslatable
                    && isset($updateFieldMap[$fieldDefinition->id][$mainLanguageCode])
                ) {
                    // If field is not set for existing language and is untranslatable and main language is updated,
                    // also update copied field data
                    // Register for processing after all given fields are updated
                    $nonTranslatableCopiesUpdateSet[$fieldDefinition->id][] = $languageCode;
                }

                // If no above conditions were met - do nothing
            }
        }

        foreach ($nonTranslatableCopiesUpdateSet as $fieldDefinitionId => $languageCodes) {
            foreach ($languageCodes as $languageCode) {
                $this->updateCopiedField(
                    $contentFieldMap[$fieldDefinitionId][$languageCode],
                    $updateFieldMap[$fieldDefinitionId][$mainLanguageCode],
                    $updatedFields[$fieldDefinitionId][$mainLanguageCode],
                    $content
                );
            }
        }

        $this->copyFields($fieldsToCopy, $content);
    }

    /**
     * Updates a language copy of a non-translatable field.
     *
     * External data is being copied here as some FieldTypes require original field external data.
     * By default copying falls back to storing, it is upon external storage implementation to override
     * the behaviour as needed.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $field
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $updateField
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field $originalField
     * @param \Ibexa\Contracts\Core\Persistence\Content $content
     */
    protected function updateCopiedField(Field $field, Field $updateField, Field $originalField, Content $content)
    {
        $field->versionNo = $content->versionInfo->versionNo;
        $field->value = clone $updateField->value;

        $this->contentGateway->updateField(
            $field,
            $this->mapper->convertToStorageValue($field)
        );

        // If the storage handler returns true, it means that $field value has been modified
        // So we need to update it in order to store those modifications
        // Field converter is called once again via the Mapper
        if ($this->storageHandler->copyFieldData($content->versionInfo, $field, $originalField) === true) {
            $this->contentGateway->updateField(
                $field,
                $this->mapper->convertToStorageValue($field)
            );
        }
    }

    /**
     * Returns given $fields structured in hash array with field definition ids and language codes as keys.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\Field[] $fields
     * @param array $languageCodes
     *
     * @return \Ibexa\Contracts\Core\Persistence\Content\Field[]
     */
    protected function getFieldMap(array $fields, &$languageCodes = null)
    {
        $fieldMap = [];
        foreach ($fields as $field) {
            if (isset($languageCodes)) {
                $languageCodes[$field->languageCode] = true;
            }
            $fieldMap[$field->fieldDefinitionId][$field->languageCode] = $field;
        }

        return $fieldMap;
    }

    /**
     * Deletes the fields for $contentId in $versionInfo from the database.
     *
     * @param int $contentId
     * @param \Ibexa\Contracts\Core\Persistence\Content\VersionInfo $versionInfo
     */
    public function deleteFields($contentId, VersionInfo $versionInfo)
    {
        foreach ($this->contentGateway->getFieldIdsByType($contentId, $versionInfo->versionNo) as $fieldType => $ids) {
            $this->storageHandler->deleteFieldData($fieldType, $versionInfo, $ids);
        }
        $this->contentGateway->deleteFields($contentId, $versionInfo->versionNo);
    }

    /**
     * Deletes translated fields and their external storage data for the given Content Versions.
     *
     * @param int $contentId
     * @param \Ibexa\Contracts\Core\Persistence\Content\VersionInfo[] $versions
     * @param string $languageCode
     */
    public function deleteTranslationFromContentFields($contentId, array $versions, $languageCode)
    {
        foreach ($versions as $versionInfo) {
            // FT-specific implementations require VersionInfo to delete data
            $fieldTypeIdsMap = $this->contentGateway->getFieldIdsByType(
                $versionInfo->contentInfo->id,
                $versionInfo->versionNo,
                $languageCode
            );

            foreach ($fieldTypeIdsMap as $fieldType => $ids) {
                $this->storageHandler->deleteFieldData($fieldType, $versionInfo, $ids);
            }
        }

        $this->contentGateway->deleteTranslatedFields($languageCode, $contentId);
    }

    /**
     * Deletes translated fields and their external storage data for the given $versionInfo.
     *
     * @param \Ibexa\Contracts\Core\Persistence\Content\VersionInfo $versionInfo
     * @param string $languageCode
     */
    public function deleteTranslationFromVersionFields(VersionInfo $versionInfo, $languageCode)
    {
        $fieldTypeIdsMap = $this->contentGateway->getFieldIdsByType(
            $versionInfo->contentInfo->id,
            $versionInfo->versionNo,
            $languageCode
        );
        foreach ($fieldTypeIdsMap as $fieldType => $ids) {
            $this->storageHandler->deleteFieldData($fieldType, $versionInfo, $ids);
        }
        $this->contentGateway->deleteTranslatedFields(
            $languageCode,
            $versionInfo->contentInfo->id,
            $versionInfo->versionNo
        );
    }
}

class_alias(FieldHandler::class, 'eZ\Publish\Core\Persistence\Legacy\Content\FieldHandler');
