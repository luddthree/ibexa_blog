<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIsSiteAccessRootService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\CorporateAccount\View\Matcher\IsSiteAccessRoot' shared autowired service.
     *
     * @return \Ibexa\CorporateAccount\View\Matcher\IsSiteAccessRoot
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/RepositoryAwareInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/RepositoryAware.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ViewMatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ContentBased/MatcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/MVC/Symfony/Matcher/ContentBased/MultipleValued.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/lib/View/Matcher/IsSiteAccessRoot.php';

        $a = ($container->privates['Ibexa\\CorporateAccount\\PageBuilder\\SiteAccess\\RootLocationProvider'] ?? $container->load('getRootLocationProviderService'));

        if (isset($container->privates['Ibexa\\CorporateAccount\\View\\Matcher\\IsSiteAccessRoot'])) {
            return $container->privates['Ibexa\\CorporateAccount\\View\\Matcher\\IsSiteAccessRoot'];
        }

        return $container->privates['Ibexa\\CorporateAccount\\View\\Matcher\\IsSiteAccessRoot'] = new \Ibexa\CorporateAccount\View\Matcher\IsSiteAccessRoot(($container->privates['Ibexa\\Core\\MVC\\Symfony\\SiteAccess\\SiteAccessService'] ?? $container->getSiteAccessServiceService()), $a);
    }
}
