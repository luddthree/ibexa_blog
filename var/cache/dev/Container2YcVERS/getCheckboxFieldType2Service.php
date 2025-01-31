<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCheckboxFieldType2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ContentForms\Form\Type\FieldType\CheckboxFieldType' shared autowired service.
     *
     * @return \Ibexa\ContentForms\Form\Type\FieldType\CheckboxFieldType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/content-forms/src/lib/Form/Type/FieldType/CheckboxFieldType.php';

        $a = ($container->services['ibexa.api.service.field_type'] ?? $container->getIbexa_Api_Service_FieldTypeService());

        if (isset($container->privates['Ibexa\\ContentForms\\Form\\Type\\FieldType\\CheckboxFieldType'])) {
            return $container->privates['Ibexa\\ContentForms\\Form\\Type\\FieldType\\CheckboxFieldType'];
        }

        return $container->privates['Ibexa\\ContentForms\\Form\\Type\\FieldType\\CheckboxFieldType'] = new \Ibexa\ContentForms\Form\Type\FieldType\CheckboxFieldType($a);
    }
}
