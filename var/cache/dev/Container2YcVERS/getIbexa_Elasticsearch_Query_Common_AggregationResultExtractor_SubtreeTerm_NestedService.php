<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIbexa_Elasticsearch_Query_Common_AggregationResultExtractor_SubtreeTerm_NestedService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ibexa.elasticsearch.query.common.aggregation_result_extractor.subtree_term.nested' shared autowired service.
     *
     * @return \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\NestedAggregationResultExtractor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/contracts/Query/AggregationResultExtractor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/NestedAggregationResultExtractor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/TermAggregationResultExtractor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/TermAggregationKeyMapper.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/ResultExtractor/AggregationResultExtractor/TermAggregationKeyMapper/SubtreeAggregationKeyMapper.php';

        $a = ($container->privates['Ibexa\\Elasticsearch\\Query\\ResultExtractor\\AggregationResultExtractor\\TermAggregationKeyMapper\\LocationAggregationKeyMapper'] ?? $container->load('getLocationAggregationKeyMapperService'));

        if (isset($container->privates['ibexa.elasticsearch.query.common.aggregation_result_extractor.subtree_term.nested'])) {
            return $container->privates['ibexa.elasticsearch.query.common.aggregation_result_extractor.subtree_term.nested'];
        }

        return $container->privates['ibexa.elasticsearch.query.common.aggregation_result_extractor.subtree_term.nested'] = new \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\NestedAggregationResultExtractor(new \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationResultExtractor('Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\Query\\Aggregation\\Location\\SubtreeTermAggregation', new \Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\SubtreeAggregationKeyMapper($a)), 'nested');
    }
}
