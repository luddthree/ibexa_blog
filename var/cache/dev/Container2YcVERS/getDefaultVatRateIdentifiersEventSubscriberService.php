<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDefaultVatRateIdentifiersEventSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\EventSubscriber\FieldType\ProductSpecification\DefaultVatRateIdentifiersEventSubscriber' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\EventSubscriber\FieldType\ProductSpecification\DefaultVatRateIdentifiersEventSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/EventSubscriber/FieldType/ProductSpecification/DefaultVatRateIdentifiersEventSubscriber.php';

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\EventSubscriber\\FieldType\\ProductSpecification\\DefaultVatRateIdentifiersEventSubscriber'] = new \Ibexa\Bundle\ProductCatalog\EventSubscriber\FieldType\ProductSpecification\DefaultVatRateIdentifiersEventSubscriber(($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\VatService'] ?? $container->load('getVatServiceService')));
    }
}
