<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_91TnfaService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.91_Tnfa' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.91_Tnfa'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'contentTypeDraft' => ['privates', '.errored..service_locator.91_Tnfa.Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeDraft', NULL, 'Cannot autowire service ".service_locator.91_Tnfa": it references class "Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeDraft" but no such service exists.'],
            'contentTypeGroup' => ['privates', '.errored..service_locator.91_Tnfa.Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeGroup', NULL, 'Cannot autowire service ".service_locator.91_Tnfa": it references class "Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeGroup" but no such service exists.'],
        ], [
            'contentTypeDraft' => 'Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeDraft',
            'contentTypeGroup' => 'Ibexa\\Contracts\\Core\\Repository\\Values\\ContentType\\ContentTypeGroup',
        ]);
    }
}
