<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Personalization\Factory\Export;

use Ibexa\Contracts\Core\SiteAccess\ConfigResolverInterface;
use Ibexa\Core\MVC\Symfony\SiteAccess\SiteAccessServiceInterface;
use Ibexa\Personalization\Client\Consumer\Item\ItemDataSender;
use Ibexa\Personalization\Config\CredentialsResolverInterface;
use Ibexa\Personalization\Exception\CredentialsNotFoundException;
use Ibexa\Personalization\Exception\InvalidArgumentException;
use Ibexa\Personalization\Exception\MissingExportParameterException;
use Ibexa\Personalization\Value\Export\Parameters;

final class ParametersFactory implements ParametersFactoryInterface
{
    private const HOST_URI_PARAMETER_NAME = 'personalization.host_uri';
    private const REQUIRED_OPTIONS = [
        'customer_id',
        'license_key',
        'siteaccess',
    ];

    private CredentialsResolverInterface $credentialsResolver;

    private ConfigResolverInterface $configResolver;

    private SiteAccessServiceInterface $siteAccessService;

    private string $itemsEndpoint;

    private string $exportParametersType;

    public function __construct(
        CredentialsResolverInterface $credentialsResolver,
        ConfigResolverInterface $configResolver,
        SiteAccessServiceInterface $siteAccessService,
        string $itemsEndpoint
    ) {
        $this->credentialsResolver = $credentialsResolver;
        $this->configResolver = $configResolver;
        $this->siteAccessService = $siteAccessService;
        $this->itemsEndpoint = $itemsEndpoint;
    }

    /**
     * @throws \Ibexa\Personalization\Exception\MissingExportParameterException
     * @throws \Ibexa\Personalization\Exception\InvalidArgumentException
     */
    public function create(array $options, string $type): Parameters
    {
        $this->exportParametersType = $type;

        return Parameters::fromArray(
            $this->getExportParameters($options)
        );
    }

    /**
     * @phpstan-param array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: ?string,
     *  license_key: ?string,
     *  siteaccess: ?string,
     *  web_hook: ?string,
     *  host: ?string,
     * } $options
     *
     * @phpstan-return array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: string,
     *  license_key: string,
     *  siteaccess: string,
     *  web_hook: string,
     *  host: string,
     * }
     *
     * @throws \Ibexa\Personalization\Exception\MissingExportParameterException
     * @throws \Ibexa\Personalization\Exception\InvalidArgumentException
     */
    private function getExportParameters(array $options): array
    {
        if (isset($options['siteaccess']) && !$this->hasConfiguredSiteAccess($options['siteaccess'])) {
            throw new InvalidArgumentException(sprintf(
                'SiteAccess %s doesn\'t exists',
                $options['siteaccess']
            ));
        }

        $configuration = $this->countConfiguredCustomerSettings() === 1
            ? $this->getCredentialsAndSiteAccessForSingleConfiguration($options)
            : $this->getCredentialsAndSiteAccessForMultiCustomerConfiguration($options);

        $siteAccess = $configuration['siteaccess'];
        $customerId = $configuration['customer_id'];

        return [
            'customer_id' => $customerId,
            'license_key' => $configuration['license_key'],
            'siteaccess' => $configuration['siteaccess'],
            'item_type_identifier_list' => $options['item_type_identifier_list'],
            'languages' => $options['languages'],
            'host' => $options['host'] ?? $this->getHostUri($siteAccess),
            'web_hook' => $options['web_hook'] ?? $this->getWebHook((int)$customerId),
            'page_size' => $options['page_size'],
        ];
    }

    private function hasConfiguredSiteAccess(string $siteAccessName): bool
    {
        foreach ($this->siteAccessService->getAll() as $siteAccess) {
            if ($siteAccessName === $siteAccess->name) {
                return true;
            }
        }

        return false;
    }

    private function countConfiguredCustomerSettings(): int
    {
        $configuredCounter = 0;

        foreach ($this->siteAccessService->getAll() as $siteAccess) {
            if ($this->credentialsResolver->hasCredentials($siteAccess->name)) {
                ++$configuredCounter;
            }
        }

        return $configuredCounter;
    }

    /**
     * @phpstan-param array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: ?string,
     *  license_key: ?string,
     *  siteaccess: ?string,
     *  web_hook: ?string,
     *  host: ?string,
     * } $options
     *
     * @phpstan-return array{
     *  customer_id: string,
     *  license_key: string,
     *  siteaccess: string,
     * }
     *
     * @throws \Ibexa\Personalization\Exception\MissingExportParameterException
     */
    private function getCredentialsAndSiteAccessForSingleConfiguration(array $options): array
    {
        if (
            (isset($options['customer_id']) || isset($options['license_key']))
            && $this->hasMissingRequiredOptions($options)
        ) {
            throw new MissingExportParameterException(
                $this->getMissingRequiredOptions($options),
                $this->exportParametersType
            );
        }

        if (isset($options['customer_id'], $options['license_key'], $options['siteaccess'])) {
            return [
                'customer_id' => $options['customer_id'],
                'license_key' => $options['license_key'],
                'siteaccess' => $options['siteaccess'],
            ];
        }

        return $this->getCredentialsAndSiteAccess();
    }

    /**
     * @phpstan-return array{
     *  customer_id: string,
     *  license_key: string,
     *  siteaccess: string,
     * }
     */
    private function getCredentialsAndSiteAccess(): array
    {
        $siteAccess = $this->getSingleConfiguredSiteAccess();
        $configuredCredentials = $this->getCredentialsForScope($siteAccess);

        return [
            'customer_id' => $configuredCredentials['customer_id'],
            'license_key' => $configuredCredentials['license_key'],
            'siteaccess' => $siteAccess,
        ];
    }

    private function getSingleConfiguredSiteAccess(): string
    {
        foreach ($this->siteAccessService->getAll() as $siteAccess) {
            if ($this->credentialsResolver->hasCredentials($siteAccess->name)) {
                return $siteAccess->name;
            }
        }

        throw new CredentialsNotFoundException();
    }

    /**
     * @phpstan-return array{
     *  customer_id: string,
     *  license_key: string,
     * }
     */
    private function getCredentialsForScope(string $siteAccess): array
    {
        if (!$this->credentialsResolver->hasCredentials($siteAccess)) {
            throw new CredentialsNotFoundException($siteAccess);
        }

        /** @var \Ibexa\Personalization\Value\Config\PersonalizationClientCredentials $credentials */
        $credentials = $this->credentialsResolver->getCredentials($siteAccess);
        /** @var int $customerId */
        $customerId = $credentials->getCustomerId();
        /** @var string $licenseKey */
        $licenseKey = $credentials->getLicenseKey();

        return [
            'customer_id' => (string)$customerId,
            'license_key' => $licenseKey,
        ];
    }

    /**
     * @phpstan-param array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: ?string,
     *  license_key: ?string,
     *  siteaccess: ?string,
     *  web_hook: ?string,
     *  host: ?string,
     * } $options
     *
     * @phpstan-return array{
     *  customer_id: string,
     *  license_key: string,
     *  siteaccess: string,
     * }
     *
     * @throws \Ibexa\Personalization\Exception\MissingExportParameterException
     */
    private function getCredentialsAndSiteAccessForMultiCustomerConfiguration(array $options): array
    {
        if ($this->hasMissingRequiredOptions($options)) {
            throw new MissingExportParameterException(
                $this->getMissingRequiredOptions($options),
                $this->exportParametersType
            );
        }

        /** @var string $customerId */
        $customerId = $options['customer_id'];
        /** @var string $licenseKey */
        $licenseKey = $options['license_key'];
        /** @var string $siteAccess */
        $siteAccess = $options['siteaccess'];

        return [
            'customer_id' => $customerId,
            'license_key' => $licenseKey,
            'siteaccess' => $siteAccess,
        ];
    }

    private function getHostUri(string $siteAccess): string
    {
        return $this->configResolver->getParameter(
            self::HOST_URI_PARAMETER_NAME,
            null,
            $siteAccess
        );
    }

    private function getWebHook(int $customerId): string
    {
        return $this->itemsEndpoint . sprintf(ItemDataSender::ENDPOINT_URI_SUFFIX, $customerId);
    }

    /**
     * @phpstan-param array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: ?string,
     *  license_key: ?string,
     *  siteaccess: ?string,
     *  web_hook: ?string,
     *  host: ?string,
     * } $options
     */
    private function hasMissingRequiredOptions(array $options): bool
    {
        return !empty($this->getMissingRequiredOptions($options));
    }

    /**
     * Checks if one of the required option is missing.
     * For single configuration user doesn't need to provide any of these options,
     * but if one of them is provided then rest of it are needed.
     *
     * @phpstan-param array{
     *  item_type_identifier_list: string,
     *  languages: string,
     *  page_size: string,
     *  customer_id: ?string,
     *  license_key: ?string,
     *  siteaccess: ?string,
     *  web_hook: ?string,
     *  host: ?string,
     * } $options
     *
     * @return array<int, string>
     */
    private function getMissingRequiredOptions(array $options): array
    {
        return array_diff(self::REQUIRED_OPTIONS, array_keys(
            array_filter($options, static function (?string $option = null): bool {
                return null !== $option;
            })
        ));
    }
}
