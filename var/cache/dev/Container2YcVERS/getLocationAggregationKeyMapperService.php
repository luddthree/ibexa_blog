<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLocationAggregationKeyMapperService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\LocationAggregationKeyMapper' shared autowired service.
     *
     * @return \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\LocationAggregationKeyMapper
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/TermAggregationKeyMapper.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/TermAggregationKeyMapper/LocationAggregationKeyMapper.php';

        $a = ($container->services['ibexa.api.service.location'] ?? $container->getIbexa_Api_Service_LocationService());

        if (isset($container->privates['Ibexa\\Elasticsearch\\Query\\ResultExtractor\\AggregationResultExtractor\\TermAggregationKeyMapper\\LocationAggregationKeyMapper'])) {
            return $container->privates['Ibexa\\Elasticsearch\\Query\\ResultExtractor\\AggregationResultExtractor\\TermAggregationKeyMapper\\LocationAggregationKeyMapper'];
        }

        return $container->privates['Ibexa\\Elasticsearch\\Query\\ResultExtractor\\AggregationResultExtractor\\TermAggregationKeyMapper\\LocationAggregationKeyMapper'] = new \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\LocationAggregationKeyMapper($a);
    }
}
