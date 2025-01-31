<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRangeAttributeDefinitionMeasurementTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Measurement\ProductCatalog\Form\Attribute\Type\RangeAttributeDefinitionMeasurementType' shared autowired service.
     *
     * @return \Ibexa\Measurement\ProductCatalog\Form\Attribute\Type\RangeAttributeDefinitionMeasurementType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/measurement/src/lib/ProductCatalog/Form/Attribute/Type/RangeAttributeDefinitionMeasurementType.php';

        return $container->privates['Ibexa\\Measurement\\ProductCatalog\\Form\\Attribute\\Type\\RangeAttributeDefinitionMeasurementType'] = new \Ibexa\Measurement\ProductCatalog\Form\Attribute\Type\RangeAttributeDefinitionMeasurementType(($container->privates['Ibexa\\Measurement\\ConfigResolver\\MeasurementTypes'] ?? $container->getMeasurementTypesService()));
    }
}
