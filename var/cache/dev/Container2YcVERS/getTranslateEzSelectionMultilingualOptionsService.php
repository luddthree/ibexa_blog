<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTranslateEzSelectionMultilingualOptionsService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\AdminUi\EventListener\TranslateEzSelectionMultilingualOptions' shared autowired service.
     *
     * @return \Ibexa\AdminUi\EventListener\TranslateEzSelectionMultilingualOptions
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/admin-ui/src/lib/EventListener/TranslateEzSelectionMultilingualOptions.php';

        return $container->services['Ibexa\\AdminUi\\EventListener\\TranslateEzSelectionMultilingualOptions'] = new \Ibexa\AdminUi\EventListener\TranslateEzSelectionMultilingualOptions();
    }
}
