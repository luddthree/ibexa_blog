<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCustomerGroupUpdateTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\Form\Type\CustomerGroupUpdateType' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Form\Type\CustomerGroupUpdateType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Form/Type/CustomerGroupUpdateType.php';

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Form\\Type\\CustomerGroupUpdateType'] = new \Ibexa\Bundle\ProductCatalog\Form\Type\CustomerGroupUpdateType();
    }
}
