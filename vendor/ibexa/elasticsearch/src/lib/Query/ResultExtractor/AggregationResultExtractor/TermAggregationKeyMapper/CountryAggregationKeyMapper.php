<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper;

use Ibexa\Contracts\Core\Repository\Values\Content\Query\Aggregation;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Aggregation\Field\CountryTermAggregation;
use Ibexa\Contracts\Elasticsearch\Query\LanguageFilter;
use Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper;

final class CountryAggregationKeyMapper implements TermAggregationKeyMapper
{
    /** @var array */
    private $countriesInfo;

    /**
     * @param array $countriesInfo Array of countries data
     */
    public function __construct(array $countriesInfo)
    {
        $this->countriesInfo = $countriesInfo;
    }

    /**
     * @param \Ibexa\Contracts\Core\Repository\Values\Content\Query\Aggregation\Field\CountryTermAggregation $aggregation
     */
    public function map(Aggregation $aggregation, LanguageFilter $languageFilter, array $keys): array
    {
        $results = [];
        foreach ($keys as $key) {
            $results[$key] = $this->mapKey($aggregation, $key);
        }

        return $results;
    }

    private function mapKey(Aggregation $aggregation, int $key): ?string
    {
        $countryInfo = $this->findCountryInfoByIDC($key);

        if ($countryInfo === null) {
            return null;
        }

        switch ($aggregation->getType()) {
            case CountryTermAggregation::TYPE_NAME:
                return $countryInfo['Name'];
            case CountryTermAggregation::TYPE_IDC:
                return $countryInfo['IDC'];
            case CountryTermAggregation::TYPE_ALPHA_2:
                return $countryInfo['Alpha2'];
            case CountryTermAggregation::TYPE_ALPHA_3:
                return $countryInfo['Alpha3'];
            default:
                return null;
        }
    }

    private function findCountryInfoByIDC(int $idc): ?array
    {
        foreach ($this->countriesInfo as $countryInfo) {
            if ((int)$countryInfo['IDC'] === $idc) {
                return $countryInfo;
            }
        }

        return null;
    }
}

class_alias(CountryAggregationKeyMapper::class, 'Ibexa\Platform\ElasticSearchEngine\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\CountryAggregationKeyMapper');
