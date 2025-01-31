<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSegmentGroupViewControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\Segmentation\Controller\REST\SegmentGroup\SegmentGroupViewController' shared autowired service.
     *
     * @return \Ibexa\Bundle\Segmentation\Controller\REST\SegmentGroup\SegmentGroupViewController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/rest/src/lib/Server/Controller.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/segmentation/src/bundle/Controller/REST/SegmentGroup/SegmentGroupViewController.php';

        $container->services['Ibexa\\Bundle\\Segmentation\\Controller\\REST\\SegmentGroup\\SegmentGroupViewController'] = $instance = new \Ibexa\Bundle\Segmentation\Controller\REST\SegmentGroup\SegmentGroupViewController(($container->privates['Ibexa\\Segmentation\\Service\\Event\\SegmentationServiceEventDecorator'] ?? $container->getSegmentationServiceEventDecoratorService()));

        $instance->setContainer($container);
        $instance->setInputDispatcher(($container->privates['Ibexa\\Rest\\Input\\Dispatcher'] ?? $container->getDispatcherService()));
        $instance->setRouter(($container->services['router'] ?? $container->getRouterService()));
        $instance->setRequestParser(($container->privates['Ibexa\\Bundle\\Rest\\RequestParser\\Router'] ?? $container->getRouter2Service()));
        $instance->setRepository(($container->services['ibexa.api.repository'] ?? $container->getIbexa_Api_RepositoryService()));

        return $instance;
    }
}
