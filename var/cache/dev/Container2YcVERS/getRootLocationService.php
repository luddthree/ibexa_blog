<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRootLocationService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Contracts\ProductCatalog\ViewMatcher\LocationBased\RootLocation' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\View\Matcher\LocationBased\RootLocation
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ViewMatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/contracts/ViewMatcher/LocationBased/RootLocation.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/View/Matcher/LocationBased/RootLocation.php';

        return $container->privates['Ibexa\\Contracts\\ProductCatalog\\ViewMatcher\\LocationBased\\RootLocation'] = new \Ibexa\Bundle\ProductCatalog\View\Matcher\LocationBased\RootLocation(($container->privates['Ibexa\\ProductCatalog\\Config\\ConfigProvider'] ?? $container->getConfigProviderService()));
    }
}
