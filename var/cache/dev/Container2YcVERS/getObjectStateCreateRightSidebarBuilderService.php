<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getObjectStateCreateRightSidebarBuilderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\AdminUi\Menu\Admin\ObjectState\ObjectStateCreateRightSidebarBuilder' shared autowired service.
     *
     * @return \Ibexa\AdminUi\Menu\Admin\ObjectState\ObjectStateCreateRightSidebarBuilder
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Menu/AbstractBuilder.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/Menu/Admin/ObjectState/ObjectStateCreateRightSidebarBuilder.php';

        $a = ($container->services['Ibexa\\AdminUi\\Menu\\MenuItemFactory'] ?? $container->load('getMenuItemFactoryService'));

        if (isset($container->services['Ibexa\\AdminUi\\Menu\\Admin\\ObjectState\\ObjectStateCreateRightSidebarBuilder'])) {
            return $container->services['Ibexa\\AdminUi\\Menu\\Admin\\ObjectState\\ObjectStateCreateRightSidebarBuilder'];
        }
        $b = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->services['Ibexa\\AdminUi\\Menu\\Admin\\ObjectState\\ObjectStateCreateRightSidebarBuilder'])) {
            return $container->services['Ibexa\\AdminUi\\Menu\\Admin\\ObjectState\\ObjectStateCreateRightSidebarBuilder'];
        }

        return $container->services['Ibexa\\AdminUi\\Menu\\Admin\\ObjectState\\ObjectStateCreateRightSidebarBuilder'] = new \Ibexa\AdminUi\Menu\Admin\ObjectState\ObjectStateCreateRightSidebarBuilder($a, $b);
    }
}
