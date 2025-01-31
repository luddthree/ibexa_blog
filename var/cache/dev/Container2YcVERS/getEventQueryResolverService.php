<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEventQueryResolverService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'debug.Ibexa\Bundle\Calendar\ArgumentResolver\EventQueryResolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Controller/ArgumentValueResolverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Controller/ArgumentResolver/TraceableValueResolver.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/calendar/src/bundle/ArgumentResolver/EventQueryResolver.php';

        $a = ($container->privates['Ibexa\\User\\UserSetting\\UserSettingService'] ?? $container->getUserSettingServiceService());

        if (isset($container->privates['debug.Ibexa\\Bundle\\Calendar\\ArgumentResolver\\EventQueryResolver'])) {
            return $container->privates['debug.Ibexa\\Bundle\\Calendar\\ArgumentResolver\\EventQueryResolver'];
        }

        return $container->privates['debug.Ibexa\\Bundle\\Calendar\\ArgumentResolver\\EventQueryResolver'] = new \Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver(new \Ibexa\Bundle\Calendar\ArgumentResolver\EventQueryResolver(($container->services['ibexa.api.service.language'] ?? $container->getIbexa_Api_Service_LanguageService()), $a), ($container->privates['debug.stopwatch'] ?? ($container->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));
    }
}
