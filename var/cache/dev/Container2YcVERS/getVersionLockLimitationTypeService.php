<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVersionLockLimitationTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Workflow\Security\Limitation\VersionLockLimitationType' shared autowired service.
     *
     * @return \Ibexa\Workflow\Security\Limitation\VersionLockLimitationType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/contracts/Limitation/Type.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/workflow/src/lib/Security/Limitation/VersionLockLimitationType.php';

        return $container->privates['Ibexa\\Workflow\\Security\\Limitation\\VersionLockLimitationType'] = new \Ibexa\Workflow\Security\Limitation\VersionLockLimitationType(($container->privates['Ibexa\\Workflow\\Persistence\\Handler\\WorkflowHandler'] ?? $container->getWorkflowHandlerService()));
    }
}
