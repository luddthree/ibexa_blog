<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConfigureMainMenuListener2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\SystemInfo\EventListener\ConfigureMainMenuListener' shared autowired service.
     *
     * @return \Ibexa\SystemInfo\EventListener\ConfigureMainMenuListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/system-info/src/lib/EventListener/ConfigureMainMenuListener.php';

        $a = ($container->services['Ibexa\\AdminUi\\Menu\\MenuItemFactory'] ?? $container->load('getMenuItemFactoryService'));

        if (isset($container->services['Ibexa\\SystemInfo\\EventListener\\ConfigureMainMenuListener'])) {
            return $container->services['Ibexa\\SystemInfo\\EventListener\\ConfigureMainMenuListener'];
        }
        $b = ($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService());

        if (isset($container->services['Ibexa\\SystemInfo\\EventListener\\ConfigureMainMenuListener'])) {
            return $container->services['Ibexa\\SystemInfo\\EventListener\\ConfigureMainMenuListener'];
        }

        return $container->services['Ibexa\\SystemInfo\\EventListener\\ConfigureMainMenuListener'] = new \Ibexa\SystemInfo\EventListener\ConfigureMainMenuListener($a, $b);
    }
}
