<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDataResolverService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Personalization\Content\DataResolver' shared autowired service.
     *
     * @return \Ibexa\Personalization\Content\DataResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Content/DataResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Content/DataResolver.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/FieldType/ValueNormalizerDispatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/FieldType/ValueNormalizerDispatcher.php';

        return $container->privates['Ibexa\\Personalization\\Content\\DataResolver'] = new \Ibexa\Personalization\Content\DataResolver(($container->services['ibexa.api.service.location'] ?? $container->getIbexa_Api_Service_LocationService()), new \Ibexa\Personalization\FieldType\ValueNormalizerDispatcher(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\AuthorNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\AuthorNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\AuthorNormalizer()));
            yield 1 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\BinaryFileNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\BinaryFileNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\BinaryFileNormalizer()));
            yield 2 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\CheckboxNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\CheckboxNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\CheckboxNormalizer()));
            yield 3 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\CountryNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\CountryNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\CountryNormalizer()));
            yield 4 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\DateNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\DateNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\DateNormalizer()));
            yield 5 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\DateAndTimeNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\DateAndTimeNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\DateAndTimeNormalizer()));
            yield 6 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\EmailAddressNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\EmailAddressNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\EmailAddressNormalizer()));
            yield 7 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\FloatNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\FloatNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\FloatNormalizer()));
            yield 8 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ImageNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ImageNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\ImageNormalizer()));
            yield 9 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ImageAssetNormalizer'] ?? $container->load('getImageAssetNormalizerService'));
            yield 10 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\IntegerNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\IntegerNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\IntegerNormalizer()));
            yield 11 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ISBNNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ISBNNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\ISBNNormalizer()));
            yield 12 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\KeywordNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\KeywordNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\KeywordNormalizer()));
            yield 13 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\MapLocationNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\MapLocationNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\MapLocationNormalizer()));
            yield 14 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\MediaNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\MediaNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\MediaNormalizer()));
            yield 15 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\RelationNormalizer'] ?? $container->load('getRelationNormalizerService'));
            yield 16 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\RelationListNormalizer'] ?? $container->load('getRelationListNormalizerService'));
            yield 17 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TextBlockNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TextBlockNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\TextBlockNormalizer()));
            yield 18 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TextLineNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TextLineNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\TextLineNormalizer()));
            yield 19 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TimeNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\TimeNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\TimeNormalizer()));
            yield 20 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\UrlNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\UrlNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\UrlNormalizer()));
        }, 21)), ($container->services['ibexa.api.service.url_alias'] ?? $container->getIbexa_Api_Service_UrlAliasService()), '/api/ibexa/v2');
    }
}
