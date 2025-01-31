<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLocationEventSubscriber3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Personalization\Event\Subscriber\LocationEventSubscriber' shared autowired service.
     *
     * @return \Ibexa\Personalization\Event\Subscriber\LocationEventSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Event/Subscriber/AbstractRepositoryEventSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Event/Subscriber/LocationEventSubscriber.php';

        $a = ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService());

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }
        $b = ($container->privates['Ibexa\\Personalization\\Service\\Content\\ContentService'] ?? $container->load('getContentService3Service'));

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }
        $c = ($container->services['ibexa.api.service.location'] ?? $container->getIbexa_Api_Service_LocationService());

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }
        $d = ($container->services['ibexa.api.repository'] ?? $container->getIbexa_Api_RepositoryService());

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }
        $e = ($container->privates['Ibexa\\Personalization\\Service\\Setting\\DefaultSiteAccessSettingService'] ?? $container->load('getDefaultSiteAccessSettingServiceService'));

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }
        $f = ($container->privates['Ibexa\\Core\\Query\\QueryFactory'] ?? $container->load('getQueryFactoryService'));

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'];
        }

        return $container->privates['Ibexa\\Personalization\\Event\\Subscriber\\LocationEventSubscriber'] = new \Ibexa\Personalization\Event\Subscriber\LocationEventSubscriber($a, $b, ($container->privates['Ibexa\\Personalization\\Config\\ItemType\\IncludedItemTypeResolver'] ?? $container->load('getIncludedItemTypeResolverService')), $c, $d, $e, $f, ($container->services['ibexa.api.service.search'] ?? $container->getIbexa_Api_Service_SearchService()));
    }
}
