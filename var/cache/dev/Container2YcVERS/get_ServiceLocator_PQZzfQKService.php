<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_PQZzfQKService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.PQZzfQK' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.PQZzfQK'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'contentInfo' => ['privates', '.errored..service_locator.PQZzfQK.Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\ContentInfo', NULL, 'Cannot autowire service ".service_locator.PQZzfQK": it references class "Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\ContentInfo" but no such service exists.'],
        ], [
            'contentInfo' => 'Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\ContentInfo',
        ]);
    }
}
