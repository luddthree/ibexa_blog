<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApplicationStateLimitationTypeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Ibexa\CorporateAccount\Form\Type\Limitation\ApplicationStateLimitationType' shared autowired service.
     *
     * @return \Ibexa\CorporateAccount\Form\Type\Limitation\ApplicationStateLimitationType
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractType.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/corporate-account/src/lib/Form/Type/Limitation/ApplicationStateLimitationType.php';

        return $container->privates['Ibexa\\CorporateAccount\\Form\\Type\\Limitation\\ApplicationStateLimitationType'] = new \Ibexa\CorporateAccount\Form\Type\Limitation\ApplicationStateLimitationType(($container->services['Ibexa\\Bundle\\Core\\DependencyInjection\\Configuration\\ChainConfigResolver'] ?? $container->getChainConfigResolverService()));
    }
}
