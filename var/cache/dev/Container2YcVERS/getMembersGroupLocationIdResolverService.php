<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMembersGroupLocationIdResolverService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\CorporateAccount\Migrations\StepExecutor\ReferenceDefinition\MembersGroupLocationIdResolver' shared autowired service.
     *
     * @return \Ibexa\CorporateAccount\Migrations\StepExecutor\ReferenceDefinition\MembersGroupLocationIdResolver
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/lib/Migrations/StepExecutor/ReferenceDefinition/MembersGroupLocationIdResolver.php';

        return $container->privates['Ibexa\\CorporateAccount\\Migrations\\StepExecutor\\ReferenceDefinition\\MembersGroupLocationIdResolver'] = new \Ibexa\CorporateAccount\Migrations\StepExecutor\ReferenceDefinition\MembersGroupLocationIdResolver(($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService()));
    }
}
