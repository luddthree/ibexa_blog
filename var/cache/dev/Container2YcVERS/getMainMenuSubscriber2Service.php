<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMainMenuSubscriber2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ActivityLog\Event\Menu\MainMenuSubscriber' shared autowired service.
     *
     * @return \Ibexa\Bundle\ActivityLog\Event\Menu\MainMenuSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/activity-log/src/bundle/Event/Menu/MainMenuSubscriber.php';

        $a = ($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService());

        if (isset($container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\Menu\\MainMenuSubscriber'])) {
            return $container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\Menu\\MainMenuSubscriber'];
        }

        return $container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\Menu\\MainMenuSubscriber'] = new \Ibexa\Bundle\ActivityLog\Event\Menu\MainMenuSubscriber($a);
    }
}
