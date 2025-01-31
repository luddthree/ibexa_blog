<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Tests\Integration\Dashboard;

use DAMA\DoctrineTestBundle\DAMADoctrineTestBundle;
use FOS\HttpCacheBundle\FOSHttpCacheBundle;
use Hautelook\TemplatedUriBundle\HautelookTemplatedUriBundle;
use Ibexa\Bundle\AdminUi\IbexaAdminUiBundle;
use Ibexa\Bundle\ContentForms\IbexaContentFormsBundle;
use Ibexa\Bundle\Dashboard\IbexaDashboardBundle;
use Ibexa\Bundle\FieldTypePage\IbexaFieldTypePageBundle;
use Ibexa\Bundle\FieldTypeRichText\IbexaFieldTypeRichTextBundle;
use Ibexa\Bundle\HttpCache\IbexaHttpCacheBundle;
use Ibexa\Bundle\Migration\IbexaMigrationBundle;
use Ibexa\Bundle\Notifications\IbexaNotificationsBundle;
use Ibexa\Bundle\PageBuilder\IbexaPageBuilderBundle;
use Ibexa\Bundle\Rest\IbexaRestBundle;
use Ibexa\Bundle\Search\IbexaSearchBundle;
use Ibexa\Bundle\User\IbexaUserBundle;
use Ibexa\Contracts\Core\SiteAccess\ConfigResolverInterface;
use Ibexa\Contracts\Dashboard\DashboardServiceInterface;
use Ibexa\Contracts\Migration\Metadata\Storage\MetadataStorage;
use Ibexa\Contracts\Migration\MigrationStorage;
use Ibexa\Contracts\Notifications\Service\NotificationServiceInterface;
use Ibexa\Contracts\Test\Core\IbexaTestKernel;
use Ibexa\Dashboard\News\Feed;
use Ibexa\Dashboard\News\IbexaNewsMapper;
use Ibexa\Dashboard\UI\DashboardBanner;
use Ibexa\Migration\Metadata\Storage\InMemoryMetadataStorage;
use Ibexa\Migration\Storage\InMemoryMigrationStorage;
use Ibexa\Tests\Integration\Dashboard\DependencyInjection\Configuration\IgnoredConfigParser;
use Knp\Menu\FactoryInterface;
use League\Flysystem\InMemory\InMemoryFilesystemAdapter;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Swift_Mailer;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer;
use Symfony\WebpackEncoreBundle\Asset\EntrypointLookupCollection;
use Symfony\WebpackEncoreBundle\Asset\TagRenderer;

/**
 * @internal
 */
final class DashboardIbexaTestKernel extends IbexaTestKernel
{
    public function registerBundles(): iterable
    {
        yield from parent::registerBundles();

        yield new IbexaMigrationBundle();
        yield new IbexaFieldTypePageBundle();
        yield new IbexaPageBuilderBundle();
        yield new IbexaRestBundle();
        yield new IbexaFieldTypeRichTextBundle();
        yield new IbexaUserBundle();
        yield new IbexaHttpCacheBundle();
        yield new IbexaAdminUiBundle();
        yield new IbexaContentFormsBundle();
        yield new IbexaSearchBundle();
        yield new IbexaNotificationsBundle();

        yield new IbexaDashboardBundle();

        yield new FOSHttpCacheBundle();
        yield new DAMADoctrineTestBundle();
        yield new HautelookTemplatedUriBundle();
    }

    public function getSchemaFiles(): iterable
    {
        yield from parent::getSchemaFiles();

        yield $this->locateResource('@IbexaFieldTypePageBundle/Resources/config/storage/schema.yaml');
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        parent::registerContainerConfiguration($loader);

        $loader->load(static function (ContainerBuilder $container): void {
            $container->setParameter('locale_fallback', 'en');
        });

        $loader->load(dirname(__DIR__, 2) . '/src/bundle/Resources/config/services.yaml');

        $loader->load(__DIR__ . '/Resources/ibexa.yaml');

        $loader->load(static function (ContainerBuilder $container): void {
            self::configureIbexaDXPBundles($container);
            self::configureThirdPartyBundles($container);

            self::loadRouting($container, __DIR__ . '/Resources/routing.yaml');
        });
    }

    private static function loadRouting(ContainerBuilder $container, string $filePath): void
    {
        $container->loadFromExtension('framework', [
            'router' => [
                'resource' => $filePath,
            ],
        ]);
        $container->addResource(new FileResource($filePath));
    }

    private static function configureIbexaDXPBundles(ContainerBuilder $container): void
    {
        self::configureMigrationsBundle($container);

        $container->setParameter('form.type_extension.csrf.enabled', false);
        $container->setParameter('ibexa.http_cache.purge_type', 'local');
        $container->setParameter('ibexa.http_cache.translation_aware.enabled', false);
        $container->setParameter('locale_fallback', 'en');
        $container->register('fragment.renderer.esi', EsiFragmentRenderer::class);

        /** @var \Ibexa\Bundle\Core\DependencyInjection\IbexaCoreExtension $kernel */
        $kernel = $container->getExtension('ibexa');
        $kernel->addConfigParser(
            new IgnoredConfigParser(
                [
                    'admin_ui_forms',
                    'calendar',
                    'content_create_view',
                    'content_translate_view',
                    'content_edit_view',
                    'design',
                    'search_view',
                    'universal_discovery_widget_module',
                ]
            )
        );
    }

    protected static function getExposedServicesByClass(): iterable
    {
        yield from parent::getExposedServicesByClass();

        yield DashboardServiceInterface::class;
        yield ConfigResolverInterface::class;
        yield Feed::class;
        yield IbexaNewsMapper::class;
        yield DashboardBanner::class;
    }

    private static function configureMigrationsBundle(ContainerBuilder $container): void
    {
        $container->setDefinition(MetadataStorage::class, new Definition(InMemoryMetadataStorage::class));
        $container->setDefinition(MigrationStorage::class, new Definition(InMemoryMigrationStorage::class));

        self::configureInMemoryMigrationsFilesystemAdapter($container);
    }

    private static function configureThirdPartyBundles(ContainerBuilder $container): void
    {
        $container->setParameter('fos_http_cache.tag_handler.strict', false);
        $container->setParameter('fos_http_cache.compiler_pass.tag_annotations', false);

        self::addSyntheticService($container, Swift_Mailer::class);
        self::addSyntheticService($container, JWTTokenManagerInterface::class);
        self::addSyntheticService($container, FactoryInterface::class);
        self::addSyntheticService($container, NotificationServiceInterface::class);
        self::addSyntheticService($container, TagRenderer::class, 'webpack_encore.tag_renderer');
        self::addSyntheticService(
            $container,
            EntrypointLookupCollection::class,
            'webpack_encore.entrypoint_lookup_collection'
        );
    }

    private static function configureInMemoryMigrationsFilesystemAdapter(ContainerBuilder $container): void
    {
        $definition = new Definition(InMemoryFilesystemAdapter::class);
        $definition->setPublic(true);
        $container->setDefinition(
            self::getAliasServiceId('ibexa.migrations.flysystem_memory_adapter'),
            $definition
        );

        $container->setAlias(
            'ibexa.migrations.io.flysystem.default_adapter',
            self::getAliasServiceId('ibexa.migrations.flysystem_memory_adapter')
        );
    }
}
