<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCurrencyResolverSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\EventSubscriber\CurrencyResolverSubscriber' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\EventSubscriber\CurrencyResolverSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/EventSubscriber/CurrencyResolverSubscriber.php';

        $a = ($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\Event\\CurrencyService'] ?? $container->getCurrencyServiceService());

        if (isset($container->privates['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\CurrencyResolverSubscriber'])) {
            return $container->privates['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\CurrencyResolverSubscriber'];
        }

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\CurrencyResolverSubscriber'] = new \Ibexa\Bundle\ProductCatalog\EventSubscriber\CurrencyResolverSubscriber($a, ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()));
    }
}
