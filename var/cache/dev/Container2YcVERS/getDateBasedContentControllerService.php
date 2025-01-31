<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDateBasedContentControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\Scheduler\Controller\DateBasedContentController' shared autowired service.
     *
     * @return \Ibexa\Bundle\Scheduler\Controller\DateBasedContentController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/scheduler/src/bundle/Controller/DateBasedContentController.php';

        $container->services['Ibexa\\Bundle\\Scheduler\\Controller\\DateBasedContentController'] = $instance = new \Ibexa\Bundle\Scheduler\Controller\DateBasedContentController(($container->privates['Ibexa\\Core\\Helper\\TranslationHelper'] ?? $container->getTranslationHelperService()), ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService()), ($container->privates['Ibexa\\AdminUi\\Notification\\TranslatableNotificationHandler'] ?? $container->getTranslatableNotificationHandlerService()), ($container->privates['Ibexa\\AdminUi\\Form\\SubmitHandler'] ?? $container->load('getSubmitHandlerService')), ($container->privates['Ibexa\\Scheduler\\Repository\\DateBasedHideService'] ?? $container->getDateBasedHideServiceService()));

        $instance->setContainer($container);

        return $instance;
    }
}
