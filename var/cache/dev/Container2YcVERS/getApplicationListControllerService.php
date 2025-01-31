<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApplicationListControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\CorporateAccount\Controller\ApplicationListController' shared autowired service.
     *
     * @return \Ibexa\Bundle\CorporateAccount\Controller\ApplicationListController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/bundle/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/bundle/Controller/ApplicationListController.php';

        $container->services['Ibexa\\Bundle\\CorporateAccount\\Controller\\ApplicationListController'] = $instance = new \Ibexa\Bundle\CorporateAccount\Controller\ApplicationListController(($container->privates['Ibexa\\CorporateAccount\\Configuration\\CorporateAccount'] ?? $container->getCorporateAccountService()), ($container->privates['Ibexa\\CorporateAccount\\Form\\ApplicationFormFactory'] ?? $container->load('getApplicationFormFactoryService')), ($container->privates['Ibexa\\CorporateAccount\\Event\\ApplicationService'] ?? $container->getApplicationServiceService()), ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService()), ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('Ibexa\\Bundle\\CorporateAccount\\Controller\\ApplicationListController', $container));

        return $instance;
    }
}
