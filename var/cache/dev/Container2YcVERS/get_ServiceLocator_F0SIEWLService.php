<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_F0SIEWLService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.F0SIEWL' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.F0SIEWL'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'content' => ['privates', '.errored..service_locator.F0SIEWL.Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\Content', NULL, 'Cannot autowire service ".service_locator.F0SIEWL": it references class "Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\Content" but no such service exists.'],
        ], [
            'content' => 'Ibexa\\Contracts\\Core\\Repository\\Values\\Content\\Content',
        ]);
    }
}
