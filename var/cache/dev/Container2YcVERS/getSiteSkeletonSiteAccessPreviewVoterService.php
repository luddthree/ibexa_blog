<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSiteSkeletonSiteAccessPreviewVoterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\SiteFactory\SiteAccess\SiteSkeletonSiteAccessPreviewVoter' shared autowired service.
     *
     * @return \Ibexa\SiteFactory\SiteAccess\SiteSkeletonSiteAccessPreviewVoter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/Siteaccess/SiteaccessPreviewVoterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/Siteaccess/AbstractSiteaccessPreviewVoter.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/site-factory/src/lib/SiteAccess/SiteSkeletonSiteAccessPreviewVoter.php';

        return $container->privates['Ibexa\\SiteFactory\\SiteAccess\\SiteSkeletonSiteAccessPreviewVoter'] = new \Ibexa\SiteFactory\SiteAccess\SiteSkeletonSiteAccessPreviewVoter(($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()), ($container->services['Ibexa\\Bundle\\Core\\ApiLoader\\RepositoryConfigurationProvider'] ?? $container->getRepositoryConfigurationProviderService()));
    }
}
