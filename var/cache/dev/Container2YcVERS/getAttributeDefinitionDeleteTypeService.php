<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAttributeDefinitionDeleteTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\Form\Type\AttributeDefinitionDeleteType' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Form\Type\AttributeDefinitionDeleteType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Form/Type/AttributeDefinitionDeleteType.php';

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Form\\Type\\AttributeDefinitionDeleteType'] = new \Ibexa\Bundle\ProductCatalog\Form\Type\AttributeDefinitionDeleteType();
    }
}
