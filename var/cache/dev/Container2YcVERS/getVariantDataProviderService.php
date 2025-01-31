<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVariantDataProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ProductCatalog\Personalization\Product\VariantDataProvider' shared autowired service.
     *
     * @return \Ibexa\ProductCatalog\Personalization\Product\VariantDataProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/Product/DataProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/Personalization/Product/VariantDataProvider.php';

        return $container->privates['Ibexa\\ProductCatalog\\Personalization\\Product\\VariantDataProvider'] = new \Ibexa\ProductCatalog\Personalization\Product\VariantDataProvider(($container->services['ibexa.api.service.url_alias'] ?? $container->getIbexa_Api_Service_UrlAliasService()));
    }
}
