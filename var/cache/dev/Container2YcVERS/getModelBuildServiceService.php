<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getModelBuildServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Personalization\Service\ModelBuild\ModelBuildService' shared autowired service.
     *
     * @return \Ibexa\Personalization\Service\ModelBuild\ModelBuildService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Service/ModelBuild/ModelBuildServiceInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Service/ModelBuild/ModelBuildService.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Client/Consumer/ModelBuild/ModelBuildDataFetcherInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Client/Consumer/ModelBuild/ModelBuildDataFetcher.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Client/Consumer/ModelBuild/ModelBuildDataSenderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/personalization/src/lib/Client/Consumer/ModelBuild/ModelBuildDataSender.php';

        $a = ($container->privates['Ibexa\\Personalization\\Service\\Setting\\DefaultSiteAccessSettingService'] ?? $container->load('getDefaultSiteAccessSettingServiceService'));

        if (isset($container->privates['Ibexa\\Personalization\\Service\\ModelBuild\\ModelBuildService'])) {
            return $container->privates['Ibexa\\Personalization\\Service\\ModelBuild\\ModelBuildService'];
        }
        $b = ($container->privates['Ibexa\\Personalization\\Client\\PersonalizationClient'] ?? $container->getPersonalizationClientService());

        return $container->privates['Ibexa\\Personalization\\Service\\ModelBuild\\ModelBuildService'] = new \Ibexa\Personalization\Service\ModelBuild\ModelBuildService(new \Ibexa\Personalization\Client\Consumer\ModelBuild\ModelBuildDataFetcher($b, 'https://admin.perso.ibexa.co'), new \Ibexa\Personalization\Client\Consumer\ModelBuild\ModelBuildDataSender($b, 'https://admin.perso.ibexa.co'), $a);
    }
}
