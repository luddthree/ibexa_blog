<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIbexa_SupportTools_View_SystemInfo_ProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'ibexa.support_tools.view.system_info.provider' shared service.
     *
     * @return \Ibexa\Bundle\Core\View\Provider\Configured
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/View/ViewProvider.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/View/Provider/Configured.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/bundle/Core/View/Provider/Configured.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/MatcherFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/DynamicallyConfiguredMatcherFactoryDecorator.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ConfigurableMatcherFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ClassNameMatcherFactory.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/bundle/Core/Matcher/ServiceAwareMatcherFactory.php';

        $a = ($container->privates['Ibexa\\Bundle\\Core\\Matcher\\ViewMatcherRegistry'] ?? $container->load('getViewMatcherRegistryService'));

        if (isset($container->privates['ibexa.support_tools.view.system_info.provider'])) {
            return $container->privates['ibexa.support_tools.view.system_info.provider'];
        }
        $b = ($container->services['ibexa.api.repository'] ?? $container->getIbexa_Api_RepositoryService());

        if (isset($container->privates['ibexa.support_tools.view.system_info.provider'])) {
            return $container->privates['ibexa.support_tools.view.system_info.provider'];
        }

        return $container->privates['ibexa.support_tools.view.system_info.provider'] = new \Ibexa\Bundle\Core\View\Provider\Configured(new \Ibexa\Core\MVC\Symfony\Matcher\DynamicallyConfiguredMatcherFactoryDecorator(new \Ibexa\Bundle\Core\Matcher\ServiceAwareMatcherFactory($a, $b, 'Ibexa\\Bundle\\SystemInfo\\View\\Matcher'), ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), 'system_info_view'));
    }
}
