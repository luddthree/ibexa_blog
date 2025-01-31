<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductService2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ProductCatalog\Local\Repository\ProductService' shared autowired service.
     *
     * @return \Ibexa\ProductCatalog\Local\Repository\ProductService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/contracts/Local/LocalProductServiceInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Local/Repository/ProductService.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Local/Repository/Attribute/ValueValidatorDispatcher.php';

        $a = ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $b = ($container->services['ibexa.api.service.location'] ?? $container->getIbexa_Api_Service_LocationService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $c = ($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProxyDomainMapper'] ?? $container->getProxyDomainMapper2Service());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $d = ($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\DomainMapper'] ?? $container->getDomainMapper5Service());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $e = ($container->privates['Ibexa\\Core\\Persistence\\Cache\\TransactionHandler'] ?? $container->getTransactionHandlerService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $f = ($container->services['ibexa.api.repository'] ?? $container->getIbexa_Api_RepositoryService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $g = ($container->privates['Ibexa\\ProductCatalog\\Local\\Permission\\PermissionResolver'] ?? $container->getPermissionResolverService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $h = ($container->privates['Ibexa\\Core\\Repository\\Permission\\PermissionCriterionResolver'] ?? $container->getPermissionCriterionResolverService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }
        $i = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'])) {
            return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'];
        }

        return $container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductService'] = new \Ibexa\ProductCatalog\Local\Repository\ProductService(($container->services['ibexa.api.service.search'] ?? $container->getIbexa_Api_Service_SearchService()), $a, $b, $c, $d, $e, ($container->privates['Ibexa\\ProductCatalog\\Local\\Persistence\\Legacy\\Product\\Handler'] ?? $container->getHandler36Service()), ($container->privates['Ibexa\\ProductCatalog\\Local\\Persistence\\Cache\\AttributeDefinition\\Handler'] ?? $container->getHandler33Service()), ($container->privates['Ibexa\\ProductCatalog\\Local\\Persistence\\Legacy\\AttributeDefinitionAssignment\\Handler'] ?? $container->load('getHandler32Service')), ($container->privates['Ibexa\\ProductCatalog\\Local\\Persistence\\Legacy\\Attribute\\Handler'] ?? $container->getHandler21Service()), $f, $g, $h, ($container->privates['Ibexa\\ProductCatalog\\Config\\ConfigProvider'] ?? $container->getConfigProviderService()), new \Ibexa\ProductCatalog\Local\Repository\Attribute\ValueValidatorDispatcher(($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\Attribute\\ValueValidatorRegistry'] ?? $container->load('getValueValidatorRegistryService'))), ($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\ProductSpecificationLocator'] ?? $container->getProductSpecificationLocatorService()), $i);
    }
}
