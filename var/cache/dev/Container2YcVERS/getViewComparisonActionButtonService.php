<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getViewComparisonActionButtonService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Bundle\VersionComparison\Event\Subscriber\ViewComparisonActionButton' shared autowired service.
     *
     * @return \Ibexa\Bundle\VersionComparison\Event\Subscriber\ViewComparisonActionButton
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/version-comparison/src/bundle/Event/Subscriber/ViewComparisonActionButton.php';

        $a = ($container->privates['Ibexa\\Core\\Repository\\Permission\\CachedPermissionService'] ?? $container->getCachedPermissionServiceService());

        if (isset($container->privates['Ibexa\\Bundle\\VersionComparison\\Event\\Subscriber\\ViewComparisonActionButton'])) {
            return $container->privates['Ibexa\\Bundle\\VersionComparison\\Event\\Subscriber\\ViewComparisonActionButton'];
        }

        return $container->privates['Ibexa\\Bundle\\VersionComparison\\Event\\Subscriber\\ViewComparisonActionButton'] = new \Ibexa\Bundle\VersionComparison\Event\Subscriber\ViewComparisonActionButton($a);
    }
}
