<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContentTypeIdentifierVisitorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Elasticsearch\Query\CriterionVisitor\ContentTypeIdentifierVisitor' shared autowired service.
     *
     * @return \Ibexa\Elasticsearch\Query\CriterionVisitor\ContentTypeIdentifierVisitor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/contracts/Query/CriterionVisitor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/elasticsearch/src/lib/Query/CriterionVisitor/ContentTypeIdentifierVisitor.php';

        $a = ($container->privates['Ibexa\\Contracts\\Core\\Persistence\\Content\\Type\\Handler'] ?? $container->getHandler10Service());

        if (isset($container->privates['Ibexa\\Elasticsearch\\Query\\CriterionVisitor\\ContentTypeIdentifierVisitor'])) {
            return $container->privates['Ibexa\\Elasticsearch\\Query\\CriterionVisitor\\ContentTypeIdentifierVisitor'];
        }

        $container->privates['Ibexa\\Elasticsearch\\Query\\CriterionVisitor\\ContentTypeIdentifierVisitor'] = $instance = new \Ibexa\Elasticsearch\Query\CriterionVisitor\ContentTypeIdentifierVisitor($a);

        $instance->setLogger(($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        return $instance;
    }
}
