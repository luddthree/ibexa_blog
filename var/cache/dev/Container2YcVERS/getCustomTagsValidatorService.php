<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCustomTagsValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\FieldTypeRichText\RichText\Validator\CustomTagsValidator' shared autowired service.
     *
     * @return \Ibexa\FieldTypeRichText\RichText\Validator\CustomTagsValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/lib/RichText/Validator/CustomTagsValidator.php';

        return $container->privates['Ibexa\\FieldTypeRichText\\RichText\\Validator\\CustomTagsValidator'] = new \Ibexa\FieldTypeRichText\RichText\Validator\CustomTagsValidator($container->parameters['ibexa.field_type.richtext.custom_tags']);
    }
}
