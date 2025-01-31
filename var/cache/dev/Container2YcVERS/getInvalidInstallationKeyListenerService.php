<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getInvalidInstallationKeyListenerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Personalization\Event\Listener\InvalidInstallationKeyListener' shared autowired service.
     *
     * @return \Ibexa\Personalization\Event\Listener\InvalidInstallationKeyListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Event/Listener/InvalidInstallationKeyListener.php';

        $a = ($container->services['router'] ?? $container->getRouterService());

        if (isset($container->privates['Ibexa\\Personalization\\Event\\Listener\\InvalidInstallationKeyListener'])) {
            return $container->privates['Ibexa\\Personalization\\Event\\Listener\\InvalidInstallationKeyListener'];
        }

        return $container->privates['Ibexa\\Personalization\\Event\\Listener\\InvalidInstallationKeyListener'] = new \Ibexa\Personalization\Event\Listener\InvalidInstallationKeyListener($a);
    }
}
