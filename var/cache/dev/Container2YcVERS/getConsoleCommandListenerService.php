<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsoleCommandListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\Core\EventListener\ConsoleCommandListener' shared service.
     *
     * @return \Ibexa\Bundle\Core\EventListener\ConsoleCommandListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/bundle/Core/EventListener/ConsoleCommandListener.php';

        $a = ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService());

        if (isset($container->privates['Ibexa\\Bundle\\Core\\EventListener\\ConsoleCommandListener'])) {
            return $container->privates['Ibexa\\Bundle\\Core\\EventListener\\ConsoleCommandListener'];
        }

        $container->privates['Ibexa\\Bundle\\Core\\EventListener\\ConsoleCommandListener'] = $instance = new \Ibexa\Bundle\Core\EventListener\ConsoleCommandListener('ludvik', ($container->privates['Ibexa\\Core\\MVC\\Symfony\\SiteAccess\\Provider\\ChainSiteAccessProvider'] ?? $container->getChainSiteAccessProviderService()), $a, true);

        $instance->setSiteAccess(($container->privates['Ibexa\\Core\\MVC\\Symfony\\SiteAccess'] ?? ($container->privates['Ibexa\\Core\\MVC\\Symfony\\SiteAccess'] = new \Ibexa\Core\MVC\Symfony\SiteAccess('default', 'uninitialized'))));

        return $instance;
    }
}
