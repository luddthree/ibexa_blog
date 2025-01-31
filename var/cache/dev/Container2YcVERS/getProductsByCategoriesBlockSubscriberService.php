<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductsByCategoriesBlockSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\ProductCatalog\EventSubscriber\PageBuilder\ProductsByCategoriesBlockSubscriber' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\EventSubscriber\PageBuilder\ProductsByCategoriesBlockSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/EventSubscriber/PageBuilder/ProductsByCategoriesBlockSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/contracts/QueryTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/lib/QueryType/Product/Block/ProductsByCategoriesQueryType.php';

        $a = ($container->privates['Ibexa\\ProductCatalog\\Dispatcher\\ProductServiceDispatcher'] ?? $container->getProductServiceDispatcherService());

        if (isset($container->services['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\PageBuilder\\ProductsByCategoriesBlockSubscriber'])) {
            return $container->services['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\PageBuilder\\ProductsByCategoriesBlockSubscriber'];
        }
        $b = ($container->privates['Ibexa\\Taxonomy\\Service\\Event\\TaxonomyService'] ?? $container->getTaxonomyServiceService());

        if (isset($container->services['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\PageBuilder\\ProductsByCategoriesBlockSubscriber'])) {
            return $container->services['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\PageBuilder\\ProductsByCategoriesBlockSubscriber'];
        }

        return $container->services['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\PageBuilder\\ProductsByCategoriesBlockSubscriber'] = new \Ibexa\Bundle\ProductCatalog\EventSubscriber\PageBuilder\ProductsByCategoriesBlockSubscriber($a, ($container->services['Ibexa\\ProductCatalog\\QueryType\\Product\\Block\\ProductsByCategoriesQueryType'] ?? ($container->services['Ibexa\\ProductCatalog\\QueryType\\Product\\Block\\ProductsByCategoriesQueryType'] = new \Ibexa\ProductCatalog\QueryType\Product\Block\ProductsByCategoriesQueryType('product_categories'))), $b, ($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()), 'product_categories');
    }
}
