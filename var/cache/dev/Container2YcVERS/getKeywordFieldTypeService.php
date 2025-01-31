<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getKeywordFieldTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\ContentForms\Form\Type\FieldType\KeywordFieldType' shared autowired service.
     *
     * @return \Ibexa\ContentForms\Form\Type\FieldType\KeywordFieldType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/content-forms/src/lib/Form/Type/FieldType/KeywordFieldType.php';

        return $container->privates['Ibexa\\ContentForms\\Form\\Type\\FieldType\\KeywordFieldType'] = new \Ibexa\ContentForms\Form\Type\FieldType\KeywordFieldType();
    }
}
