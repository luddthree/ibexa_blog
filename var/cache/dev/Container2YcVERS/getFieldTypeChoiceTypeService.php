<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFieldTypeChoiceTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\AdminUi\Form\Type\ContentType\FieldTypeChoiceType' shared autowired service.
     *
     * @return \Ibexa\AdminUi\Form\Type\ContentType\FieldTypeChoiceType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/Form/Type/ContentType/FieldTypeChoiceType.php';

        $a = ($container->privates['Ibexa\\Core\\FieldType\\FieldTypeRegistry'] ?? $container->getFieldTypeRegistryService());

        if (isset($container->privates['Ibexa\\AdminUi\\Form\\Type\\ContentType\\FieldTypeChoiceType'])) {
            return $container->privates['Ibexa\\AdminUi\\Form\\Type\\ContentType\\FieldTypeChoiceType'];
        }

        return $container->privates['Ibexa\\AdminUi\\Form\\Type\\ContentType\\FieldTypeChoiceType'] = new \Ibexa\AdminUi\Form\Type\ContentType\FieldTypeChoiceType($a, ($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()));
    }
}
