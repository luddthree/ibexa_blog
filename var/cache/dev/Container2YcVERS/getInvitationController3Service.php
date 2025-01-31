<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getInvitationController3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\CorporateAccount\Controller\InvitationController' shared autowired service.
     *
     * @return \Ibexa\Bundle\CorporateAccount\Controller\InvitationController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/bundle/Controller/InvitationController.php';

        $container->services['Ibexa\\Bundle\\CorporateAccount\\Controller\\InvitationController'] = $instance = new \Ibexa\Bundle\CorporateAccount\Controller\InvitationController(($container->privates['Ibexa\\CorporateAccount\\Form\\MemberFormFactory'] ?? $container->load('getMemberFormFactoryService')), ($container->privates['Ibexa\\CorporateAccount\\Form\\ActionDispatcher\\InvitationDispatcher'] ?? $container->load('getInvitationDispatcherService')), ($container->privates['Ibexa\\AdminUi\\Notification\\TranslatableNotificationHandler'] ?? $container->getTranslatableNotificationHandlerService()));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('Ibexa\\Bundle\\CorporateAccount\\Controller\\InvitationController', $container));

        return $instance;
    }
}
