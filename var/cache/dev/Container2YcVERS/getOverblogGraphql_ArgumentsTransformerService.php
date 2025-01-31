<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getOverblogGraphql_ArgumentsTransformerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'overblog_graphql.arguments_transformer' shared service.
     *
     * @return \Overblog\GraphQLBundle\Transformer\ArgumentsTransformer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/overblog/graphql-bundle/src/Transformer/ArgumentsTransformer.php';

        return $container->services['overblog_graphql.arguments_transformer'] = new \Overblog\GraphQLBundle\Transformer\ArgumentsTransformer(($container->services['.container.private.validator'] ?? $container->get_Container_Private_ValidatorService()), []);
    }
}
