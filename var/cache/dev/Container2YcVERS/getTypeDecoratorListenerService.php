<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTypeDecoratorListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Overblog\GraphQLBundle\EventListener\TypeDecoratorListener' shared service.
     *
     * @return \Overblog\GraphQLBundle\EventListener\TypeDecoratorListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/overblog/graphql-bundle/src/EventListener/TypeDecoratorListener.php';
        include_once \dirname(__DIR__, 4).'/vendor/overblog/graphql-bundle/src/Resolver/ResolverMapInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/overblog/graphql-bundle/src/Resolver/ResolverMap.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/graphql/src/lib/Resolver/Map/UploadMap.php';
        include_once \dirname(__DIR__, 4).'/vendor/overblog/graphql-bundle/src/Definition/ArgumentFactory.php';

        $container->privates['Overblog\\GraphQLBundle\\EventListener\\TypeDecoratorListener'] = $instance = new \Overblog\GraphQLBundle\EventListener\TypeDecoratorListener(($container->privates['Overblog\\GraphQLBundle\\Definition\\ArgumentFactory'] ?? ($container->privates['Overblog\\GraphQLBundle\\Definition\\ArgumentFactory'] = new \Overblog\GraphQLBundle\Definition\ArgumentFactory('Overblog\\GraphQLBundle\\Definition\\Argument'))));

        $instance->addSchemaResolverMaps('default', [0 => new \Ibexa\GraphQL\Resolver\Map\UploadMap()]);

        return $instance;
    }
}
