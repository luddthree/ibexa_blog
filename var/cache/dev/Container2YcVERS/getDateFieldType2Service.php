<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDateFieldType2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ContentForms\Form\Type\FieldType\DateFieldType' shared autowired service.
     *
     * @return \Ibexa\ContentForms\Form\Type\FieldType\DateFieldType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/content-forms/src/lib/Form/Type/FieldType/DateFieldType.php';

        return $container->privates['Ibexa\\ContentForms\\Form\\Type\\FieldType\\DateFieldType'] = new \Ibexa\ContentForms\Form\Type\FieldType\DateFieldType(($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }
}
