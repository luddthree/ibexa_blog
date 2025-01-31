<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreate2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Migration\Generator\ContentTypeGroup\StepBuilder\Create' shared autowired service.
     *
     * @return \Ibexa\Migration\Generator\ContentTypeGroup\StepBuilder\Create
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/StepBuilder/StepBuilderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/ContentTypeGroup/StepBuilder/Create.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Reference/AbstractReferenceGenerator.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Reference/ContentTypeGroupGenerator.php';

        return $container->privates['Ibexa\\Migration\\Generator\\ContentTypeGroup\\StepBuilder\\Create'] = new \Ibexa\Migration\Generator\ContentTypeGroup\StepBuilder\Create(new \Ibexa\Migration\Generator\Reference\ContentTypeGroupGenerator());
    }
}
