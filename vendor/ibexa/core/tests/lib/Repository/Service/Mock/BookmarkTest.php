<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Tests\Core\Repository\Service\Mock;

use Exception;
use Ibexa\Contracts\Core\Persistence\Bookmark\Bookmark;
use Ibexa\Contracts\Core\Persistence\Bookmark\CreateStruct;
use Ibexa\Contracts\Core\Repository\Exceptions\InvalidArgumentException;
use Ibexa\Contracts\Core\Repository\LocationService;
use Ibexa\Contracts\Core\Repository\PermissionResolver;
use Ibexa\Contracts\Core\Repository\Values\Content\ContentInfo;
use Ibexa\Core\Repository\BookmarkService;
use Ibexa\Core\Repository\Values\Content\Location;
use Ibexa\Core\Repository\Values\User\UserReference;
use Ibexa\Tests\Core\Repository\Service\Mock\Base as BaseServiceMockTest;
use PHPUnit\Framework\MockObject\MockObject;

class BookmarkTest extends BaseServiceMockTest
{
    public const BOOKMARK_ID = 2;
    public const CURRENT_USER_ID = 7;
    public const LOCATION_ID = 1;

    /** @var \Ibexa\Contracts\Core\Persistence\Bookmark\Handler|\PHPUnit\Framework\MockObject\MockObject */
    private $bookmarkHandler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bookmarkHandler = $this->getPersistenceMockHandler('Bookmark\\Handler');

        $permissionResolverMock = $this->createMock(PermissionResolver::class);
        $permissionResolverMock
            ->expects($this->atLeastOnce())
            ->method('getCurrentUserReference')
            ->willReturn(new UserReference(self::CURRENT_USER_ID));

        $repository = $this->getRepositoryMock();
        $repository
            ->expects($this->atLeastOnce())
            ->method('getPermissionResolver')
            ->willReturn($permissionResolverMock);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::createBookmark
     */
    public function testCreateBookmark()
    {
        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([]);

        $this->assertTransactionIsCommitted(function () {
            $this->bookmarkHandler
                ->expects($this->once())
                ->method('create')
                ->willReturnCallback(function (CreateStruct $createStruct) {
                    $this->assertEquals(self::LOCATION_ID, $createStruct->locationId);
                    $this->assertEquals(self::CURRENT_USER_ID, $createStruct->userId);

                    return new Bookmark();
                });
        });

        $this->createBookmarkService()->createBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::createBookmark
     */
    public function testCreateBookmarkThrowsInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([self::LOCATION_ID => new Bookmark()]);

        $this->assertTransactionIsNotStarted(function () {
            $this->bookmarkHandler->expects($this->never())->method('create');
        });

        $this->createBookmarkService()->createBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::createBookmark
     */
    public function testCreateBookmarkWithRollback()
    {
        $this->expectException(\Exception::class);

        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([]);

        $this->assertTransactionIsRollback(function () {
            $this->bookmarkHandler
                ->expects($this->once())
                ->method('create')
                ->willThrowException($this->createMock(Exception::class));
        });

        $this->createBookmarkService()->createBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::deleteBookmark
     */
    public function testDeleteBookmarkExisting()
    {
        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $bookmark = new Bookmark(['id' => self::BOOKMARK_ID]);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([self::LOCATION_ID => $bookmark]);

        $this->assertTransactionIsCommitted(function () use ($bookmark) {
            $this->bookmarkHandler
                ->expects($this->once())
                ->method('delete')
                ->with($bookmark->id);
        });

        $this->createBookmarkService()->deleteBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::deleteBookmark
     */
    public function testDeleteBookmarkWithRollback()
    {
        $this->expectException(\Exception::class);

        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([self::LOCATION_ID => new Bookmark(['id' => self::BOOKMARK_ID])]);

        $this->assertTransactionIsRollback(function () {
            $this->bookmarkHandler
                ->expects($this->once())
                ->method('delete')
                ->willThrowException($this->createMock(Exception::class));
        });

        $this->createBookmarkService()->deleteBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::deleteBookmark
     */
    public function testDeleteBookmarkNonExisting()
    {
        $this->expectException(InvalidArgumentException::class);

        $location = $this->createLocation(self::LOCATION_ID);

        $this->assertLocationIsLoaded($location);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([]);

        $this->assertTransactionIsNotStarted(function () {
            $this->bookmarkHandler->expects($this->never())->method('delete');
        });

        $this->createBookmarkService()->deleteBookmark($location);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::loadBookmarks
     */
    public function testLoadBookmarks()
    {
        $offset = 0;
        $limit = 25;

        $expectedTotalCount = 10;
        $expectedItems = array_map(function ($locationId) {
            return $this->createLocation($locationId);
        }, range(1, $expectedTotalCount));

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('countUserBookmarks')
            ->with(self::CURRENT_USER_ID)
            ->willReturn($expectedTotalCount);

        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadUserBookmarks')
            ->with(self::CURRENT_USER_ID, $offset, $limit)
            ->willReturn(array_map(static function ($locationId) {
                return new Bookmark(['locationId' => $locationId]);
            }, range(1, $expectedTotalCount)));

        $locationServiceMock = $this->createMock(LocationService::class);
        $locationServiceMock
            ->expects($this->exactly($expectedTotalCount))
            ->method('loadLocation')
            ->willReturnCallback(function ($locationId) {
                return $this->createLocation($locationId);
            });

        $repository = $this->getRepositoryMock();
        $repository
            ->expects($this->any())
            ->method('getLocationService')
            ->willReturn($locationServiceMock);

        $bookmarks = $this->createBookmarkService()->loadBookmarks($offset, $limit);

        $this->assertEquals($expectedTotalCount, $bookmarks->totalCount);
        $this->assertEquals($expectedItems, $bookmarks->items);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::loadBookmarks
     */
    public function testLoadBookmarksEmptyList()
    {
        $this->bookmarkHandler
            ->expects($this->once())
            ->method('countUserBookmarks')
            ->with(self::CURRENT_USER_ID)
            ->willReturn(0);

        $this->bookmarkHandler
            ->expects($this->never())
            ->method('loadUserBookmarks');

        $bookmarks = $this->createBookmarkService()->loadBookmarks(0, 10);

        $this->assertEquals(0, $bookmarks->totalCount);
        $this->assertEmpty($bookmarks->items);
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::isBookmarked
     */
    public function testLocationShouldNotBeBookmarked()
    {
        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([]);

        $this->assertFalse($this->createBookmarkService()->isBookmarked($this->createLocation(self::LOCATION_ID)));
    }

    /**
     * @covers \Ibexa\Contracts\Core\Repository\BookmarkService::isBookmarked
     */
    public function testLocationShouldBeBookmarked()
    {
        $this->bookmarkHandler
            ->expects($this->once())
            ->method('loadByUserIdAndLocationId')
            ->with(self::CURRENT_USER_ID, [self::LOCATION_ID])
            ->willReturn([self::LOCATION_ID => new Bookmark()]);

        $this->assertTrue($this->createBookmarkService()->isBookmarked($this->createLocation(self::LOCATION_ID)));
    }

    private function assertLocationIsLoaded(Location $location): MockObject
    {
        $locationServiceMock = $this->createMock(LocationService::class);
        $locationServiceMock
            ->expects($this->once())
            ->method('loadLocation')
            ->willReturn($location);

        $repository = $this->getRepositoryMock();
        $repository
            ->expects($this->once())
            ->method('getLocationService')
            ->willReturn($locationServiceMock);

        return $locationServiceMock;
    }

    private function assertTransactionIsNotStarted(callable $operation): void
    {
        $repository = $this->getRepositoryMock();
        $repository->expects($this->never())->method('beginTransaction');
        $operation();
        $repository->expects($this->never())->method('commit');
        $repository->expects($this->never())->method('rollback');
    }

    private function assertTransactionIsCommitted(callable $operation): void
    {
        $repository = $this->getRepositoryMock();
        $repository->expects($this->once())->method('beginTransaction');
        $operation();
        $repository->expects($this->once())->method('commit');
        $repository->expects($this->never())->method('rollback');
    }

    private function assertTransactionIsRollback(callable $operation): void
    {
        $repository = $this->getRepositoryMock();
        $repository->expects($this->once())->method('beginTransaction');
        $operation();
        $repository->expects($this->never())->method('commit');
        $repository->expects($this->once())->method('rollback');
    }

    private function createLocation(int $id = self::CURRENT_USER_ID, string $name = 'Lorem ipsum...'): Location
    {
        return new Location([
            'id' => $id,
            'contentInfo' => new ContentInfo([
                'name' => $name,
            ]),
        ]);
    }

    /**
     * @return \Ibexa\Contracts\Core\Repository\BookmarkService|\PHPUnit\Framework\MockObject\MockObject
     */
    private function createBookmarkService(array $methods = null)
    {
        return $this
            ->getMockBuilder(BookmarkService::class)
            ->setConstructorArgs([$this->getRepositoryMock(), $this->bookmarkHandler])
            ->setMethods($methods)
            ->getMock();
    }
}

class_alias(BookmarkTest::class, 'eZ\Publish\Core\Repository\Tests\Service\Mock\BookmarkTest');
