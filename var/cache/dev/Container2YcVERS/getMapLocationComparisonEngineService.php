<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMapLocationComparisonEngineService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\VersionComparison\Engine\FieldType\MapLocationComparisonEngine' shared autowired service.
     *
     * @return \Ibexa\VersionComparison\Engine\FieldType\MapLocationComparisonEngine
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/version-comparison/src/contracts/Engine/FieldTypeComparisonEngine.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/version-comparison/src/lib/Engine/FieldType/MapLocationComparisonEngine.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/version-comparison/src/lib/Engine/Value/StringComparisonEngine.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/version-comparison/src/lib/Engine/Value/FloatComparisonEngine.php';

        return $container->privates['Ibexa\\VersionComparison\\Engine\\FieldType\\MapLocationComparisonEngine'] = new \Ibexa\VersionComparison\Engine\FieldType\MapLocationComparisonEngine(($container->privates['Ibexa\\VersionComparison\\Engine\\Value\\StringComparisonEngine'] ?? ($container->privates['Ibexa\\VersionComparison\\Engine\\Value\\StringComparisonEngine'] = new \Ibexa\VersionComparison\Engine\Value\StringComparisonEngine())), ($container->privates['Ibexa\\VersionComparison\\Engine\\Value\\FloatComparisonEngine'] ?? ($container->privates['Ibexa\\VersionComparison\\Engine\\Value\\FloatComparisonEngine'] = new \Ibexa\VersionComparison\Engine\Value\FloatComparisonEngine())));
    }
}
