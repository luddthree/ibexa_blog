<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateController5Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\ProductCatalog\Controller\CustomerGroup\CreateController' shared autowired service.
     *
     * @return \Ibexa\Bundle\ProductCatalog\Controller\CustomerGroup\CreateController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/contracts/Controller/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Controller/CustomerGroup/CreateController.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/product-catalog/src/bundle/Form/DataMapper/CustomerGroupCreateMapper.php';

        $container->services['Ibexa\\Bundle\\ProductCatalog\\Controller\\CustomerGroup\\CreateController'] = $instance = new \Ibexa\Bundle\ProductCatalog\Controller\CustomerGroup\CreateController(($container->privates['Ibexa\\AdminUi\\Notification\\TranslatableNotificationHandler'] ?? $container->getTranslatableNotificationHandlerService()), ($container->privates['Ibexa\\ProductCatalog\\Local\\Repository\\CustomerGroupService'] ?? $container->getCustomerGroupServiceService()), new \Ibexa\Bundle\ProductCatalog\Form\DataMapper\CustomerGroupCreateMapper(), ($container->privates['Ibexa\\AdminUi\\Form\\SubmitHandler'] ?? $container->load('getSubmitHandlerService')));

        $instance->setContainer(($container->privates['.service_locator.mx0UMmY'] ?? $container->load('get_ServiceLocator_Mx0UMmYService'))->withContext('Ibexa\\Bundle\\ProductCatalog\\Controller\\CustomerGroup\\CreateController', $container));

        return $instance;
    }
}
