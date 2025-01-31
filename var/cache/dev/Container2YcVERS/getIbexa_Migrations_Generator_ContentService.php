<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIbexa_Migrations_Generator_ContentService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ibexa.migrations.generator.content' shared autowired service.
     *
     * @return \Ibexa\Migration\Generator\Content\ContentMigrationGenerator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/MigrationGeneratorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Content/ContentMigrationGenerator.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/StepBuilder/StepFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Log/LoggerAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/StepBuilder/AbstractStepFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Content/StepBuilder/Factory.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/CriterionFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/AbstractCriterionFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/Content/CriterionFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/CriterionGenerator/GeneratorRegistryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Generator/CriterionGenerator/GeneratorRegistry.php';

        $a = new \Ibexa\Migration\Generator\Content\StepBuilder\Factory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'create' => ['privates', 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Create', 'getCreate3Service', true],
            'delete' => ['privates', 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Delete', 'getDelete2Service', true],
            'update' => ['privates', 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Update', 'getUpdate2Service', true],
        ], [
            'create' => 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Create',
            'delete' => 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Delete',
            'update' => 'Ibexa\\Migration\\Generator\\Content\\StepBuilder\\Update',
        ]), 'content');
        $a->setLogger(($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        return $container->privates['ibexa.migrations.generator.content'] = new \Ibexa\Migration\Generator\Content\ContentMigrationGenerator(($container->services['ibexa.api.service.search'] ?? $container->getIbexa_Api_Service_SearchService()), $a, new \Ibexa\Migration\Generator\Content\CriterionFactory(new \Ibexa\Migration\Generator\CriterionGenerator\GeneratorRegistry(new RewindableGenerator(function () use ($container) {
            yield 'content_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ContentIdGenerator()));
            yield 'content_remote_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentRemoteIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentRemoteIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ContentRemoteIdGenerator()));
            yield 'content_type_group_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeGroupIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeGroupIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ContentTypeGroupIdGenerator()));
            yield 'content_type_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ContentTypeIdGenerator()));
            yield 'content_type_identifier' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeIdentifierGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ContentTypeIdentifierGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ContentTypeIdentifierGenerator()));
            yield 'location_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\LocationIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\LocationIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\LocationIdGenerator()));
            yield 'location_remote_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\LocationRemoteIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\LocationRemoteIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\LocationRemoteIdGenerator()));
            yield 'parent_location_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ParentLocationIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\ParentLocationIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\ParentLocationIdGenerator()));
            yield 'user_email' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserEmailGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserEmailGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\UserEmailGenerator()));
            yield 'user_id' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserIdGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserIdGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\UserIdGenerator()));
            yield 'user_login' => ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserLoginGenerator'] ?? ($container->privates['Ibexa\\Migration\\Generator\\CriterionGenerator\\UserLoginGenerator'] = new \Ibexa\Migration\Generator\CriterionGenerator\UserLoginGenerator()));
        }, 11))), 'content', 100);
    }
}
