<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductsPreviewControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\ProductCatalog\Controller\Catalog\ProductsPreviewController' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Controller\Catalog\ProductsPreviewController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Controller/Catalog/ProductsPreviewController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Serializer/ProductNormalizer.php';

        $container->services['Ibexa\\Bundle\\ProductCatalog\\Controller\\Catalog\\ProductsPreviewController'] = $instance = new \Ibexa\Bundle\ProductCatalog\Controller\Catalog\ProductsPreviewController(($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\CatalogFilter\\DefinitionProvider\\ChainFilterDefinitionProvider'] ?? $container->load('getChainFilterDefinitionProviderService')), ($container->privates['Ibexa\\ProductCatalog\\Dispatcher\\ProductServiceDispatcher'] ?? $container->getProductServiceDispatcherService()), ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), new \Symfony\Component\Serializer\Serializer([0 => new \Ibexa\Bundle\ProductCatalog\Serializer\ProductNormalizer(($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()), ($container->services['router'] ?? $container->getRouterService()), ($container->privates['ibexa.user.settings.full_datetime_format.formatter'] ?? $container->getIbexa_User_Settings_FullDatetimeFormat_FormatterService()))], [0 => ($container->privates['serializer.encoder.json'] ?? ($container->privates['serializer.encoder.json'] = new \Symfony\Component\Serializer\Encoder\JsonEncoder(NULL, NULL)))]), ($container->privates['Ibexa\\ProductCatalog\\QueryType\\QueryTypeRegistry'] ?? $container->load('getQueryTypeRegistryService')));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('Ibexa\\Bundle\\ProductCatalog\\Controller\\Catalog\\ProductsPreviewController', $container));

        return $instance;
    }
}
