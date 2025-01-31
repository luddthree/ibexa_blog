<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaxonomySubtreeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Taxonomy\Search\ElasticSearch\Criterion\Visitor\TaxonomySubtree' shared autowired service.
     *
     * @return \Ibexa\Taxonomy\Search\ElasticSearch\Criterion\Visitor\TaxonomySubtree
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/contracts/Query/CriterionVisitor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/taxonomy/src/lib/Search/ElasticSearch/Criterion/Visitor/TaxonomySubtree.php';

        $a = ($container->privates['Ibexa\\Taxonomy\\Service\\Event\\TaxonomyService'] ?? $container->getTaxonomyServiceService());

        if (isset($container->privates['Ibexa\\Taxonomy\\Search\\ElasticSearch\\Criterion\\Visitor\\TaxonomySubtree'])) {
            return $container->privates['Ibexa\\Taxonomy\\Search\\ElasticSearch\\Criterion\\Visitor\\TaxonomySubtree'];
        }

        return $container->privates['Ibexa\\Taxonomy\\Search\\ElasticSearch\\Criterion\\Visitor\\TaxonomySubtree'] = new \Ibexa\Taxonomy\Search\ElasticSearch\Criterion\Visitor\TaxonomySubtree($a);
    }
}
