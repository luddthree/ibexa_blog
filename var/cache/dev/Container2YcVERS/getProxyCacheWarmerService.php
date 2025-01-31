<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProxyCacheWarmerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\Bundle\FieldTypePage\CacheWarmer\ProxyCacheWarmer' shared autowired service.
     *
     * @return \Ibexa\Bundle\FieldTypePage\CacheWarmer\ProxyCacheWarmer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/CacheWarmer/CacheWarmerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-page/src/bundle/CacheWarmer/ProxyCacheWarmer.php';

        return $container->services['Ibexa\\Bundle\\FieldTypePage\\CacheWarmer\\ProxyCacheWarmer'] = new \Ibexa\Bundle\FieldTypePage\CacheWarmer\ProxyCacheWarmer(($container->privates['Ibexa\\Core\\Repository\\ProxyFactory\\ProxyGenerator'] ?? ($container->privates['Ibexa\\Core\\Repository\\ProxyFactory\\ProxyGenerator'] = new \Ibexa\Core\Repository\ProxyFactory\ProxyGenerator(($container->targetDir.''.'/repository/proxy')))));
    }
}
