<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLayoutDefinitionConverterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\FieldTypePage\FieldType\LandingPage\Converter\LayoutDefinitionConverter' shared autowired service.
     *
     * @return \Ibexa\FieldTypePage\FieldType\LandingPage\Converter\LayoutDefinitionConverter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-page/src/lib/FieldType/LandingPage/Converter/LayoutDefinitionConverter.php';

        return $container->services['Ibexa\\FieldTypePage\\FieldType\\LandingPage\\Converter\\LayoutDefinitionConverter'] = new \Ibexa\FieldTypePage\FieldType\LandingPage\Converter\LayoutDefinitionConverter(($container->services['Ibexa\\FieldTypePage\\Registry\\LayoutDefinitionRegistry'] ?? $container->getLayoutDefinitionRegistryService()));
    }
}
