<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLocationPreviewControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\SiteContext\Controller\LocationPreviewController' shared autowired service.
     *
     * @return \Ibexa\Bundle\SiteContext\Controller\LocationPreviewController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/site-context/src/bundle/Controller/LocationPreviewController.php';

        $container->services['Ibexa\\Bundle\\SiteContext\\Controller\\LocationPreviewController'] = $instance = new \Ibexa\Bundle\SiteContext\Controller\LocationPreviewController(($container->privates['Ibexa\\SiteContext\\SiteContextService'] ?? $container->getSiteContextServiceService()), ($container->privates['Ibexa\\SiteContext\\PreviewUrlResolver\\LocationPreviewUrlResolver'] ?? $container->load('getLocationPreviewUrlResolverService')));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('Ibexa\\Bundle\\SiteContext\\Controller\\LocationPreviewController', $container));

        return $instance;
    }
}
