<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDashboardCreateViewParametersSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Dashboard\EventSubscriber\PageBuilderViewParameters\DashboardCreateViewParametersSubscriber' shared autowired service.
     *
     * @return \Ibexa\Dashboard\EventSubscriber\PageBuilderViewParameters\DashboardCreateViewParametersSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/dashboard/src/lib/EventSubscriber/PageBuilderViewParameters/BaseDashboardViewParametersSubscriber.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/dashboard/src/lib/EventSubscriber/PageBuilderViewParameters/DashboardCreateViewParametersSubscriber.php';

        return $container->services['Ibexa\\Dashboard\\EventSubscriber\\PageBuilderViewParameters\\DashboardCreateViewParametersSubscriber'] = new \Ibexa\Dashboard\EventSubscriber\PageBuilderViewParameters\DashboardCreateViewParametersSubscriber(($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), $container->parameters['ibexa.dashboard.page_builder.config']);
    }
}
