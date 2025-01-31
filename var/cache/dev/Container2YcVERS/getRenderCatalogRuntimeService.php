<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRenderCatalogRuntimeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\Twig\RenderCatalogRuntime' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Twig\RenderCatalogRuntime
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/RuntimeExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Twig/RenderCatalogRuntime.php';

        $a = ($container->services['ibexa.api.service.location'] ?? $container->getIbexa_Api_Service_LocationService());

        if (isset($container->privates['Ibexa\\Bundle\\ProductCatalog\\Twig\\RenderCatalogRuntime'])) {
            return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Twig\\RenderCatalogRuntime'];
        }

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Twig\\RenderCatalogRuntime'] = new \Ibexa\Bundle\ProductCatalog\Twig\RenderCatalogRuntime(($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()), ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), ($container->privates['Ibexa\\ProductCatalog\\Config\\ConfigProvider'] ?? $container->getConfigProviderService()), $a);
    }
}
