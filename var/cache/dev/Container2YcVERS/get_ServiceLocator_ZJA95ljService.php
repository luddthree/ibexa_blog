<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZJA95ljService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.zJA95lj' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.zJA95lj'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'member' => ['privates', '.errored..service_locator.zJA95lj.Ibexa\\Contracts\\CorporateAccount\\Values\\Member', NULL, 'Cannot autowire service ".service_locator.zJA95lj": it references class "Ibexa\\Contracts\\CorporateAccount\\Values\\Member" but no such service exists.'],
        ], [
            'member' => 'Ibexa\\Contracts\\CorporateAccount\\Values\\Member',
        ]);
    }
}
