<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getChangeOwnerLimitationTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Core\Limitation\ChangeOwnerLimitationType' shared service.
     *
     * @return \Ibexa\Core\Limitation\ChangeOwnerLimitationType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/Limitation/AbstractPersistenceLimitationType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/contracts/Limitation/Type.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/Limitation/ChangeOwnerLimitationType.php';

        $a = ($container->privates['Ibexa\\Core\\Persistence\\Cache\\Handler'] ?? $container->getHandler2Service());

        if (isset($container->privates['Ibexa\\Core\\Limitation\\ChangeOwnerLimitationType'])) {
            return $container->privates['Ibexa\\Core\\Limitation\\ChangeOwnerLimitationType'];
        }

        return $container->privates['Ibexa\\Core\\Limitation\\ChangeOwnerLimitationType'] = new \Ibexa\Core\Limitation\ChangeOwnerLimitationType($a);
    }
}
