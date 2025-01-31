<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSeoFieldsCollectionTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Seo\Form\Type\FieldType\SeoFieldsCollectionType' shared autowired service.
     *
     * @return \Ibexa\Seo\Form\Type\FieldType\SeoFieldsCollectionType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/seo/src/lib/Form/Type/FieldType/SeoFieldsCollectionType.php';

        return $container->privates['Ibexa\\Seo\\Form\\Type\\FieldType\\SeoFieldsCollectionType'] = new \Ibexa\Seo\Form\Type\FieldType\SeoFieldsCollectionType(($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()));
    }
}
