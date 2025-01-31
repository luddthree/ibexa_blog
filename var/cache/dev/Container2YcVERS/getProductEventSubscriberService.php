<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductEventSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ProductCatalog\Personalization\Event\Subscriber\ProductEventSubscriber' shared autowired service.
     *
     * @return \Ibexa\ProductCatalog\Personalization\Event\Subscriber\ProductEventSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/Event/Subscriber/ProductEventSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/contracts/Content/AbstractContentService.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/Service/Product/ProductServiceInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/Service/Product/ProductService.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/ProductVariant/Routing/UrlGeneratorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/ProductVariant/Routing/UrlGenerator.php';

        $a = ($container->privates['Ibexa\\Personalization\\Service\\Content\\ContentService'] ?? $container->load('getContentService3Service'));

        if (isset($container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'];
        }
        $b = ($container->privates['Ibexa\\Personalization\\Service\\Item\\ItemService'] ?? $container->load('getItemServiceService'));

        if (isset($container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'];
        }
        $c = ($container->privates['Ibexa\\Personalization\\Service\\Setting\\DefaultSiteAccessSettingService'] ?? $container->load('getDefaultSiteAccessSettingServiceService'));

        if (isset($container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'];
        }
        $d = ($container->privates['Ibexa\\ProductCatalog\\Dispatcher\\ProductServiceDispatcher'] ?? $container->getProductServiceDispatcherService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'];
        }
        $e = ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService());

        $f = new \Ibexa\ProductCatalog\Personalization\Service\Product\ProductService(($container->privates['Ibexa\\Personalization\\Config\\Authentication\\ParametersResolver'] ?? $container->load('getParametersResolverService')), $b, $c, ($container->privates['Ibexa\\Personalization\\Config\\ItemType\\IncludedItemTypeResolver'] ?? $container->load('getIncludedItemTypeResolverService')), new \Ibexa\ProductCatalog\Personalization\ProductVariant\Routing\UrlGenerator(($container->privates['Ibexa\\Personalization\\Config\\Host\\HostResolver'] ?? $container->load('getHostResolverService')), $d), $e);
        $f->setLogger($e);

        return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Event\\Subscriber\\ProductEventSubscriber'] = new \Ibexa\ProductCatalog\Personalization\Event\Subscriber\ProductEventSubscriber($a, $f, $d, ($container->privates['Ibexa\\ProductCatalog\\Local\\Permission\\PermissionResolver'] ?? $container->getPermissionResolverService()));
    }
}
