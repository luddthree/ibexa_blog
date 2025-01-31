<?php

namespace Container2YcVERS;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getBlockRenderSubscriberService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Ibexa\FieldTypePage\Event\Subscriber\BlockRenderSubscriber' shared autowired service.
     *
     * @return \Ibexa\FieldTypePage\Event\Subscriber\BlockRenderSubscriber
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/ibexa/fieldtype-page/src/lib/Event/Subscriber/BlockRenderSubscriber.php';

        return $container->services['Ibexa\\FieldTypePage\\Event\\Subscriber\\BlockRenderSubscriber'] = new \Ibexa\FieldTypePage\Event\Subscriber\BlockRenderSubscriber();
    }
}
