<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDestinationContentNormalizerDispatcherService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Personalization\FieldType\DestinationContentNormalizerDispatcher' shared autowired service.
     *
     * @return \Ibexa\Personalization\FieldType\DestinationContentNormalizerDispatcher
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/FieldType/DestinationContentNormalizerDispatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/FieldType/DestinationContentNormalizerDispatcher.php';

        return $container->privates['Ibexa\\Personalization\\FieldType\\DestinationContentNormalizerDispatcher'] = new \Ibexa\Personalization\FieldType\DestinationContentNormalizerDispatcher(($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService()), ($container->services['ibexa.api.repository'] ?? $container->getIbexa_Api_RepositoryService()), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ImageNormalizer'] ?? ($container->privates['Ibexa\\Bundle\\Personalization\\Serializer\\Normalizer\\FieldType\\ImageNormalizer'] = new \Ibexa\Bundle\Personalization\Serializer\Normalizer\FieldType\ImageNormalizer()));
        }, 1));
    }
}
