<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getActionAttributeSerializationSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ActivityLog\EventSubscriber\PageBuilder\ActionAttributeSerializationSubscriber' shared autowired service.
     *
     * @return \Ibexa\Bundle\ActivityLog\EventSubscriber\PageBuilder\ActionAttributeSerializationSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/activity-log/src/bundle/EventSubscriber/PageBuilder/AbstractChoiceAttributeSerializationSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/activity-log/src/bundle/EventSubscriber/PageBuilder/ActionAttributeSerializationSubscriber.php';

        $a = ($container->privates['Ibexa\\ActivityLog\\ActivityLogService'] ?? $container->getActivityLogServiceService());

        if (isset($container->privates['Ibexa\\Bundle\\ActivityLog\\EventSubscriber\\PageBuilder\\ActionAttributeSerializationSubscriber'])) {
            return $container->privates['Ibexa\\Bundle\\ActivityLog\\EventSubscriber\\PageBuilder\\ActionAttributeSerializationSubscriber'];
        }
        $b = ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService());

        $container->privates['Ibexa\\Bundle\\ActivityLog\\EventSubscriber\\PageBuilder\\ActionAttributeSerializationSubscriber'] = $instance = new \Ibexa\Bundle\ActivityLog\EventSubscriber\PageBuilder\ActionAttributeSerializationSubscriber($a, $b);

        $instance->setLogger($b);

        return $instance;
    }
}
