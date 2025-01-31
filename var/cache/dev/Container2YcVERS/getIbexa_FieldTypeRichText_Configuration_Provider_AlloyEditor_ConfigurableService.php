<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIbexa_FieldTypeRichText_Configuration_Provider_AlloyEditor_ConfigurableService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ibexa.field_type_rich_text.configuration.provider.alloy_editor.configurable' shared autowired service.
     *
     * @return \Ibexa\FieldTypeRichText\Configuration\Provider\ConfigurableProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/contracts/Configuration/Provider.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/lib/Configuration/Provider/ConfigurableProvider.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/lib/Configuration/Provider/AlloyEditor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/lib/Configuration/UI/Mapper/OnlineEditorConfigMapper.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-richtext/src/lib/Configuration/UI/Mapper/OnlineEditor.php';

        return $container->privates['ibexa.field_type_rich_text.configuration.provider.alloy_editor.configurable'] = new \Ibexa\FieldTypeRichText\Configuration\Provider\ConfigurableProvider(new \Ibexa\FieldTypeRichText\Configuration\Provider\AlloyEditor($container->parameters['ibexa.field_type.richtext.alloy_editor'], ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), new \Ibexa\FieldTypeRichText\Configuration\UI\Mapper\OnlineEditor(($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()), 'online_editor')), new RewindableGenerator(function () use ($container) {
            return new \EmptyIterator();
        }, 0));
    }
}
