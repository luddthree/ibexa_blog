<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getVersionConflictControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\AdminUi\Controller\Version\VersionConflictController' shared autowired service.
     *
     * @return \Ibexa\Bundle\AdminUi\Controller\Version\VersionConflictController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/bundle/Controller/Version/VersionConflictController.php';

        $container->services['Ibexa\\Bundle\\AdminUi\\Controller\\Version\\VersionConflictController'] = $instance = new \Ibexa\Bundle\AdminUi\Controller\Version\VersionConflictController(($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService()));

        $instance->setContainer($container);

        return $instance;
    }
}
