<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Tests\Bundle\Core\EventListener;

use Ibexa\Bundle\Core\EventListener\ConfigScopeListener;
use Ibexa\Core\MVC\Symfony\Configuration\VersatileScopeInterface;
use Ibexa\Core\MVC\Symfony\Event\ScopeChangeEvent;
use Ibexa\Core\MVC\Symfony\MVCEvents;
use Ibexa\Core\MVC\Symfony\SiteAccess;
use Ibexa\Tests\Bundle\Core\EventListener\Stubs\ViewManager;
use Ibexa\Tests\Bundle\Core\EventListener\Stubs\ViewProvider;
use PHPUnit\Framework\TestCase;

class ConfigScopeListenerTest extends TestCase
{
    /** @var \PHPUnit\Framework\MockObject\MockObject */
    private $configResolver;

    /** @var \PHPUnit\Framework\MockObject\MockObject */
    private $viewManager;

    /** @var \PHPUnit\Framework\MockObject\MockObject */
    private $viewProviders;

    protected function setUp(): void
    {
        parent::setUp();
        $this->configResolver = $this->createMock(VersatileScopeInterface::class);
        $this->viewManager = $this->createMock(ViewManager::class);
        $this->viewProviders = [
            $this->createMock(ViewProvider::class),
            $this->createMock(ViewProvider::class),
        ];
    }

    public function testGetSubscribedEvents()
    {
        $this->assertSame(
            [
                MVCEvents::CONFIG_SCOPE_CHANGE => ['onConfigScopeChange', 100],
                MVCEvents::CONFIG_SCOPE_RESTORE => ['onConfigScopeChange', 100],
            ],
            ConfigScopeListener::getSubscribedEvents()
        );
    }

    public function testOnConfigScopeChange()
    {
        $siteAccess = new SiteAccess('test');
        $event = new ScopeChangeEvent($siteAccess);
        $this->configResolver
            ->expects($this->once())
            ->method('setDefaultScope')
            ->with($siteAccess->name);
        $this->viewManager
            ->expects($this->once())
            ->method('setSiteAccess')
            ->with($siteAccess);

        foreach ($this->viewProviders as $viewProvider) {
            $viewProvider
                ->expects($this->once())
                ->method('setSiteAccess')
                ->with($siteAccess);
        }

        $listener = new ConfigScopeListener([$this->configResolver], $this->viewManager);
        $listener->setViewProviders($this->viewProviders);
        $listener->onConfigScopeChange($event);
        $this->assertSame($siteAccess, $event->getSiteAccess());
    }
}

class_alias(ConfigScopeListenerTest::class, 'eZ\Bundle\EzPublishCoreBundle\Tests\EventListener\ConfigScopeListenerTest');
