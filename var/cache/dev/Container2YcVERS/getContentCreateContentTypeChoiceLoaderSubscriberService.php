<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContentCreateContentTypeChoiceLoaderSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Dashboard\EventSubscriber\ContentCreateContentTypeChoiceLoaderSubscriber' shared autowired service.
     *
     * @return \Ibexa\Dashboard\EventSubscriber\ContentCreateContentTypeChoiceLoaderSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/dashboard/src/lib/EventSubscriber/ContentCreateContentTypeChoiceLoaderSubscriber.php';

        $a = ($container->services['ibexa.api.service.content_type'] ?? $container->getIbexa_Api_Service_ContentTypeService());

        if (isset($container->services['Ibexa\\Dashboard\\EventSubscriber\\ContentCreateContentTypeChoiceLoaderSubscriber'])) {
            return $container->services['Ibexa\\Dashboard\\EventSubscriber\\ContentCreateContentTypeChoiceLoaderSubscriber'];
        }
        $b = ($container->privates['Ibexa\\Contracts\\Core\\Persistence\\Content\\Location\\Handler'] ?? $container->getHandler4Service());

        if (isset($container->services['Ibexa\\Dashboard\\EventSubscriber\\ContentCreateContentTypeChoiceLoaderSubscriber'])) {
            return $container->services['Ibexa\\Dashboard\\EventSubscriber\\ContentCreateContentTypeChoiceLoaderSubscriber'];
        }

        return $container->services['Ibexa\\Dashboard\\EventSubscriber\\ContentCreateContentTypeChoiceLoaderSubscriber'] = new \Ibexa\Dashboard\EventSubscriber\ContentCreateContentTypeChoiceLoaderSubscriber(($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), $a, $b);
    }
}
