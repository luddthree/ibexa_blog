<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLanguageCreateStepExecutorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Migration\StepExecutor\LanguageCreateStepExecutor' shared autowired service.
     *
     * @return \Ibexa\Migration\StepExecutor\LanguageCreateStepExecutor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/StepExecutorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/UserContextAwareStepExecutorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/service-contracts/ServiceSubscriberTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/UserContextAwareStepExecutorTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/contracts/StepExecutor/AbstractStepExecutor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/Log/LoggerAwareTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/LanguageCreateStepExecutor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/ActionExecutor/ExecutorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/ActionExecutor/AbstractExecutor.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/migrations/src/lib/StepExecutor/ActionExecutor/Executor.php';

        $container->privates['Ibexa\\Migration\\StepExecutor\\LanguageCreateStepExecutor'] = $instance = new \Ibexa\Migration\StepExecutor\LanguageCreateStepExecutor(($container->services['ibexa.api.service.language'] ?? $container->getIbexa_Api_Service_LanguageService()), new \Ibexa\Migration\StepExecutor\ActionExecutor\Executor(($container->privates['.service_locator.Xbsa8iG'] ?? ($container->privates['.service_locator.Xbsa8iG'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [], [])))), ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()));

        $instance->setPermissionResolver(($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService()));
        $instance->setContainer((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'Ibexa\\Contracts\\Core\\Persistence\\TransactionHandler' => ['privates', 'Ibexa\\Core\\Persistence\\Cache\\TransactionHandler', 'getTransactionHandlerService', false],
            'Ibexa\\Migration\\Reference\\CollectorInterface' => ['privates', 'Ibexa\\Migration\\Reference\\Collector', 'getCollectorService', true],
            'Ibexa\\Migration\\StepExecutor\\ReferenceDefinition\\ResolverInterface' => ['privates', 'ibexa.migrations.reference_definition.resolver.language', 'getIbexa_Migrations_ReferenceDefinition_Resolver_LanguageService', true],
        ], [
            'Ibexa\\Contracts\\Core\\Persistence\\TransactionHandler' => '?',
            'Ibexa\\Migration\\Reference\\CollectorInterface' => '?',
            'Ibexa\\Migration\\StepExecutor\\ReferenceDefinition\\ResolverInterface' => 'Ibexa\\Migration\\StepExecutor\\ReferenceDefinition\\ResolverInterface',
        ]))->withContext('Ibexa\\Migration\\StepExecutor\\LanguageCreateStepExecutor', $container));

        return $instance;
    }
}
