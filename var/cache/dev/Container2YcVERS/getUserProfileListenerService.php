<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserProfileListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\AdminUi\EventListener\UserProfileListener' shared autowired service.
     *
     * @return \Ibexa\AdminUi\EventListener\UserProfileListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/EventListener/UserProfileListener.php';

        $a = ($container->privates['Ibexa\\Core\\Repository\\Repository'] ?? $container->getRepositoryService());

        if (isset($container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'])) {
            return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'];
        }
        $b = ($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService());

        if (isset($container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'])) {
            return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'];
        }
        $c = ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService());

        if (isset($container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'])) {
            return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'];
        }
        $d = ($container->services['ibexa.api.service.user'] ?? $container->getIbexa_Api_Service_UserService());

        if (isset($container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'])) {
            return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'];
        }
        $e = ($container->services['router'] ?? $container->getRouterService());

        if (isset($container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'])) {
            return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'];
        }

        return $container->services['Ibexa\\AdminUi\\EventListener\\UserProfileListener'] = new \Ibexa\AdminUi\EventListener\UserProfileListener($a, $b, $c, $d, $e, ($container->privates['Ibexa\\AdminUi\\UserProfile\\UserProfileConfiguration'] ?? $container->getUserProfileConfigurationService()), ($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
