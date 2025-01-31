<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getAssetControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\AdminUi\Controller\AssetController' shared autowired service.
     *
     * @return \Ibexa\Bundle\AdminUi\Controller\AssetController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/bundle/Controller/AssetController.php';

        $container->services['Ibexa\\Bundle\\AdminUi\\Controller\\AssetController'] = $instance = new \Ibexa\Bundle\AdminUi\Controller\AssetController(($container->services['.container.private.validator'] ?? $container->get_Container_Private_ValidatorService()), ($container->services['.container.private.security.csrf.token_manager'] ?? $container->load('get_Container_Private_Security_Csrf_TokenManagerService')), ($container->privates['Ibexa\\Core\\FieldType\\ImageAsset\\AssetMapper'] ?? $container->getAssetMapperService()), ($container->services['Symfony\\Contracts\\Translation\\TranslatorInterface'] ?? $container->getTranslatorInterfaceService()));

        $instance->setContainer($container);
        $instance->performAccessCheck();

        return $instance;
    }
}
