<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContentUpdateStructValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\Core\Repository\Validator\ContentUpdateStructValidator' shared service.
     *
     * @return \Ibexa\Core\Repository\Validator\ContentUpdateStructValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/core/src/lib/Repository/Validator/ContentUpdateStructValidator.php';

        $a = ($container->privates['Ibexa\\Core\\FieldType\\FieldTypeRegistry'] ?? $container->getFieldTypeRegistryService());

        if (isset($container->privates['Ibexa\\Core\\Repository\\Validator\\ContentUpdateStructValidator'])) {
            return $container->privates['Ibexa\\Core\\Repository\\Validator\\ContentUpdateStructValidator'];
        }

        return $container->privates['Ibexa\\Core\\Repository\\Validator\\ContentUpdateStructValidator'] = new \Ibexa\Core\Repository\Validator\ContentUpdateStructValidator(($container->privates['Ibexa\\Core\\Repository\\Mapper\\ContentMapper'] ?? $container->getContentMapperService()), $a, ($container->privates['Ibexa\\Contracts\\Core\\Persistence\\Content\\Language\\Handler'] ?? $container->getHandler8Service()));
    }
}
