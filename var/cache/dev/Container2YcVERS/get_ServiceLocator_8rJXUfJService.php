<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_8rJXUfJService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.8rJXUfJ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.8rJXUfJ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'inputDispatcher' => ['privates', 'Ibexa\\Rest\\Input\\Dispatcher', 'getDispatcherService', false],
        ], [
            'inputDispatcher' => 'Ibexa\\Rest\\Input\\Dispatcher',
        ]);
    }
}
