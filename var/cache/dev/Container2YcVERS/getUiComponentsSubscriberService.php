<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUiComponentsSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Workflow\Event\Subscriber\UiComponentsSubscriber' shared autowired service.
     *
     * @return \Ibexa\Workflow\Event\Subscriber\UiComponentsSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/workflow/src/lib/Event/Subscriber/UiComponentsSubscriber.php';

        $a = ($container->privates['Ibexa\\Workflow\\Registry\\WorkflowRegistry'] ?? $container->getWorkflowRegistryService());

        if (isset($container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'])) {
            return $container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'];
        }
        $b = ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService());

        if (isset($container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'])) {
            return $container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'];
        }
        $c = ($container->privates['Ibexa\\AdminUi\\Form\\Factory\\FormFactory'] ?? $container->getFormFactory2Service());

        if (isset($container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'])) {
            return $container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'];
        }
        $d = ($container->privates['Ibexa\\Workflow\\Registry\\WorkflowDefinitionMetadataRegistry'] ?? $container->getWorkflowDefinitionMetadataRegistryService());

        if (isset($container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'])) {
            return $container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'];
        }

        return $container->privates['Ibexa\\Workflow\\Event\\Subscriber\\UiComponentsSubscriber'] = new \Ibexa\Workflow\Event\Subscriber\UiComponentsSubscriber($a, $b, $c, ($container->privates['Ibexa\\Workflow\\Service\\WorkflowService'] ?? $container->getWorkflowServiceService()), $d);
    }
}
