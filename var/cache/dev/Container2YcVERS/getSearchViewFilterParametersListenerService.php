<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSearchViewFilterParametersListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\AdminUi\EventListener\SearchViewFilterParametersListener' shared autowired service.
     *
     * @return \Ibexa\AdminUi\EventListener\SearchViewFilterParametersListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/EventListener/SearchViewFilterParametersListener.php';

        $a = ($container->services['.container.private.form.factory'] ?? $container->get_Container_Private_Form_FactoryService());

        if (isset($container->privates['Ibexa\\AdminUi\\EventListener\\SearchViewFilterParametersListener'])) {
            return $container->privates['Ibexa\\AdminUi\\EventListener\\SearchViewFilterParametersListener'];
        }

        return $container->privates['Ibexa\\AdminUi\\EventListener\\SearchViewFilterParametersListener'] = new \Ibexa\AdminUi\EventListener\SearchViewFilterParametersListener($a, ($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), ($container->services['request_stack'] ?? ($container->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), $container->parameters['ibexa.site_access.groups']);
    }
}
