<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContentTypeFormProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\AdminUi\Form\Processor\ContentType\ContentTypeFormProcessor' shared autowired service.
     *
     * @return \Ibexa\AdminUi\Form\Processor\ContentType\ContentTypeFormProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/Form/Processor/ContentType/ContentTypeFormProcessor.php';

        $a = ($container->services['ibexa.api.service.content_type'] ?? $container->getIbexa_Api_Service_ContentTypeService());

        if (isset($container->privates['Ibexa\\AdminUi\\Form\\Processor\\ContentType\\ContentTypeFormProcessor'])) {
            return $container->privates['Ibexa\\AdminUi\\Form\\Processor\\ContentType\\ContentTypeFormProcessor'];
        }
        $b = ($container->services['router'] ?? $container->getRouterService());

        if (isset($container->privates['Ibexa\\AdminUi\\Form\\Processor\\ContentType\\ContentTypeFormProcessor'])) {
            return $container->privates['Ibexa\\AdminUi\\Form\\Processor\\ContentType\\ContentTypeFormProcessor'];
        }

        $container->privates['Ibexa\\AdminUi\\Form\\Processor\\ContentType\\ContentTypeFormProcessor'] = $instance = new \Ibexa\AdminUi\Form\Processor\ContentType\ContentTypeFormProcessor($a, $b, $container->parameters['ibexa.content_forms.form_processor.content_type.options']);

        $instance->setGroupsList(($container->privates['Ibexa\\CorporateAccount\\FieldType\\FieldGroupsListDecorator'] ?? $container->getFieldGroupsListDecoratorService()));

        return $instance;
    }
}
