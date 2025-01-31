<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDateFieldTypeExtensionService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\ProductCatalog\Form\Extension\DateFieldTypeExtension' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Form\Extension\DateFieldTypeExtension
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractTypeExtension.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Form/Extension/DateFieldTypeExtension.php';

        return $container->privates['Ibexa\\Bundle\\ProductCatalog\\Form\\Extension\\DateFieldTypeExtension'] = new \Ibexa\Bundle\ProductCatalog\Form\Extension\DateFieldTypeExtension(($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
