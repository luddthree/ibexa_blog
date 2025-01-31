<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getContentContainerTypeValidatorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\FieldTypePage\Validator\Constraints\ContentContainerTypeValidator' shared autowired service.
     *
     * @return \Ibexa\FieldTypePage\Validator\Constraints\ContentContainerTypeValidator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/validator/ConstraintValidator.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-page/src/lib/Validator/Constraints/ContentContainerTypeValidator.php';

        $a = ($container->services['ibexa.api.service.content'] ?? $container->getIbexa_Api_Service_ContentService());

        if (isset($container->privates['Ibexa\\FieldTypePage\\Validator\\Constraints\\ContentContainerTypeValidator'])) {
            return $container->privates['Ibexa\\FieldTypePage\\Validator\\Constraints\\ContentContainerTypeValidator'];
        }

        return $container->privates['Ibexa\\FieldTypePage\\Validator\\Constraints\\ContentContainerTypeValidator'] = new \Ibexa\FieldTypePage\Validator\Constraints\ContentContainerTypeValidator($a);
    }
}
