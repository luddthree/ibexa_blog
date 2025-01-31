<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreate8Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Migration\Generator\UserGroup\StepBuilder\Create' shared autowired service.
     *
     * @return \Ibexa\Migration\Generator\UserGroup\StepBuilder\Create
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/StepBuilder/StepBuilderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/UserGroup/StepBuilder/Create.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Reference/AbstractReferenceGenerator.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Reference/UserGroupGenerator.php';

        return $container->privates['Ibexa\\Migration\\Generator\\UserGroup\\StepBuilder\\Create'] = new \Ibexa\Migration\Generator\UserGroup\StepBuilder\Create(($container->privates['Ibexa\\Migration\\Service\\FieldTypeService'] ?? $container->load('getFieldTypeServiceService')), ($container->privates['Ibexa\\Migration\\Generator\\Reference\\UserGroupGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\Reference\\UserGroupGenerator'] = new \Ibexa\Migration\Generator\Reference\UserGroupGenerator())));
    }
}
