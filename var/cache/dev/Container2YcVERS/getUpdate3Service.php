<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUpdate3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Migration\Generator\Location\StepBuilder\Update' shared autowired service.
     *
     * @return \Ibexa\Migration\Generator\Location\StepBuilder\Update
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/StepBuilder/StepBuilderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Location/StepBuilder/Update.php';

        return $container->privates['Ibexa\\Migration\\Generator\\Location\\StepBuilder\\Update'] = new \Ibexa\Migration\Generator\Location\StepBuilder\Update();
    }
}
