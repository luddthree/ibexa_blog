<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_FrMJv5aService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.FrMJv5a' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.FrMJv5a'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'contentType' => ['privates', '.errored..service_locator.FrMJv5a.Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentType', NULL, 'Cannot autowire service ".service_locator.FrMJv5a": it references class "Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentType" but no such service exists.'],
        ], [
            'contentType' => 'Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentType',
        ]);
    }
}
