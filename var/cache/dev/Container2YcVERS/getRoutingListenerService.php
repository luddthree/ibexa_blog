<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRoutingListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\Core\EventListener\RoutingListener' shared service.
     *
     * @return \Ibexa\Bundle\Core\EventListener\RoutingListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/bundle/Core/EventListener/RoutingListener.php';

        $a = ($container->privates['Ibexa\\Bundle\\Core\\Routing\\UrlAliasRouter'] ?? $container->getUrlAliasRouterService());

        if (isset($container->privates['Ibexa\\Bundle\\Core\\EventListener\\RoutingListener'])) {
            return $container->privates['Ibexa\\Bundle\\Core\\EventListener\\RoutingListener'];
        }
        $b = ($container->privates['Ibexa\\Core\\MVC\\Symfony\\Routing\\Generator\\UrlAliasGenerator'] ?? $container->getUrlAliasGeneratorService());

        if (isset($container->privates['Ibexa\\Bundle\\Core\\EventListener\\RoutingListener'])) {
            return $container->privates['Ibexa\\Bundle\\Core\\EventListener\\RoutingListener'];
        }

        return $container->privates['Ibexa\\Bundle\\Core\\EventListener\\RoutingListener'] = new \Ibexa\Bundle\Core\EventListener\RoutingListener(($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), $a, $b);
    }
}
