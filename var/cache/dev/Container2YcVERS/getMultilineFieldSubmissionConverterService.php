<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMultilineFieldSubmissionConverterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\FormBuilder\FormSubmission\Converter\MultilineFieldSubmissionConverter' shared autowired service.
     *
     * @return \Ibexa\FormBuilder\FormSubmission\Converter\MultilineFieldSubmissionConverter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/form-builder/src/lib/FormSubmission/Converter/FieldSubmissionConverterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/form-builder/src/lib/FormSubmission/Converter/GenericFieldSubmissionConverter.php';
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/form-builder/src/lib/FormSubmission/Converter/MultilineFieldSubmissionConverter.php';

        $a = ($container->services['.container.private.twig'] ?? $container->get_Container_Private_TwigService());

        if (isset($container->services['Ibexa\\FormBuilder\\FormSubmission\\Converter\\MultilineFieldSubmissionConverter'])) {
            return $container->services['Ibexa\\FormBuilder\\FormSubmission\\Converter\\MultilineFieldSubmissionConverter'];
        }

        return $container->services['Ibexa\\FormBuilder\\FormSubmission\\Converter\\MultilineFieldSubmissionConverter'] = new \Ibexa\FormBuilder\FormSubmission\Converter\MultilineFieldSubmissionConverter('multi_line', $a);
    }
}
