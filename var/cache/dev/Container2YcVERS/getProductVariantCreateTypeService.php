<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductVariantCreateTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\Form\Type\ProductVariantCreateType' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Form\Type\ProductVariantCreateType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Form/Type/ProductVariantCreateType.php';

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Form\\Type\\ProductVariantCreateType'] = new \Ibexa\Bundle\ProductCatalog\Form\Type\ProductVariantCreateType();
    }
}
