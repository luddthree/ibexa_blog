<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getShippingAddressItemCheckboxTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\CorporateAccount\Form\Type\ShippingAddress\ShippingAddressItemCheckboxType' shared autowired service.
     *
     * @return \Ibexa\CorporateAccount\Form\Type\ShippingAddress\ShippingAddressItemCheckboxType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/lib/Form/Type/ShippingAddress/ShippingAddressItemCheckboxType.php';

        $a = ($container->privates['Ibexa\\CorporateAccount\\Event\\ShippingAddressService'] ?? $container->getShippingAddressServiceService());

        if (isset($container->privates['Ibexa\\CorporateAccount\\Form\\Type\\ShippingAddress\\ShippingAddressItemCheckboxType'])) {
            return $container->privates['Ibexa\\CorporateAccount\\Form\\Type\\ShippingAddress\\ShippingAddressItemCheckboxType'];
        }

        return $container->privates['Ibexa\\CorporateAccount\\Form\\Type\\ShippingAddress\\ShippingAddressItemCheckboxType'] = new \Ibexa\CorporateAccount\Form\Type\ShippingAddress\ShippingAddressItemCheckboxType($a);
    }
}
