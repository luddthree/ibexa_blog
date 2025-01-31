<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLocationEventsListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ActivityLog\Event\LocationEventsListener' shared autowired service.
     *
     * @return \Ibexa\Bundle\ActivityLog\Event\LocationEventsListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/activity-log/src/bundle/Event/LocationEventsListener.php';

        $a = ($container->privates['Ibexa\\ActivityLog\\ActivityLogService'] ?? $container->getActivityLogServiceService());

        if (isset($container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\LocationEventsListener'])) {
            return $container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\LocationEventsListener'];
        }

        return $container->privates['Ibexa\\Bundle\\ActivityLog\\Event\\LocationEventsListener'] = new \Ibexa\Bundle\ActivityLog\Event\LocationEventsListener($a);
    }
}
