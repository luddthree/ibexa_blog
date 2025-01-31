<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Tests\Rest\Server\Output\ValueObjectVisitor;

use Ibexa\Contracts\Core\Repository\ContentService;
use Ibexa\Contracts\Core\Repository\LocationService;
use Ibexa\Contracts\Core\Repository\Values\Content\ContentInfo;
use Ibexa\Contracts\Core\Repository\Values\Content\Location as ApiLocation;
use Ibexa\Core\Base\Exceptions\UnauthorizedException;
use Ibexa\Core\Repository\Values\Content\Content;
use Ibexa\Core\Repository\Values\Content\Location;
use Ibexa\Core\Repository\Values\Content\VersionInfo;
use Ibexa\Core\Repository\Values\ContentType\ContentType;
use Ibexa\Rest\Server\Output\ValueObjectVisitor;
use Ibexa\Tests\Rest\Output\ValueObjectVisitorBaseTest;

final class LocationTest extends ValueObjectVisitorBaseTest
{
    private const MAIN_LOCATION_ID = 78;

    private const UNAUTHORIZED_MAIN_LOCATION_ID = 111;

    private const LOCATION_ID = 55;

    /** @var \Ibexa\Contracts\Core\Repository\LocationService&\PHPUnit\Framework\MockObject\MockObject */
    private LocationService $locationServiceMock;

    /** @var \Ibexa\Contracts\Core\Repository\ContentService&\PHPUnit\Framework\MockObject\MockObject */
    private ContentService $contentServiceMock;

    protected function setUp(): void
    {
        $this->locationServiceMock = $this->createMock(LocationService::class);
        $this->contentServiceMock = $this->createMock(ContentService::class);

        parent::setUp();
    }

    /**
     * @dataProvider getDataForTestVisitLocationAttributesResolvesMainLocation
     */
    public function testVisitLocationAttributesResolvesMainLocation(
        ?int $mainLocationId,
        int $locationId
    ): void {
        $visitor = $this->getVisitor();
        $generator = $this->getGenerator();

        $generator->startDocument(null);

        $contentId = 7;
        $versionInfo = new VersionInfo();

        $location = new Location([
            'id' => $locationId,
            'path' => ['1', '25', '42'],
            'priority' => 1,
            'sortField' => ApiLocation::SORT_FIELD_DEPTH,
            'sortOrder' => ApiLocation::SORT_ORDER_ASC,
            'parentLocationId' => 42,
            'contentInfo' => new ContentInfo([
                'id' => $contentId,
                'mainLocationId' => $mainLocationId,
            ]),
            'content' => new Content([
                'id' => $contentId,
                'contentType' => new ContentType(),
                'versionInfo' => $versionInfo,
            ]),
        ]);

        $this->mockLoadLocation($location);

        $this->contentServiceMock->expects(self::once())
            ->method('loadRelations')
            ->with($versionInfo)
            ->willReturn([]);

        $visitor->visit(
            $this->getVisitorMock(),
            $generator,
            $location
        );

        $result = $generator->endDocument(null);

        self::assertNotNull($result);

        $this->assertXMLTag(
            [
                'tag' => 'Location',
                'content' => $location->id . 1 . 'false' . 'false',
            ],
            $result,
            'Invalid <Location> element.',
        );
    }

    private function mockLoadLocation(Location $location): void
    {
        $mainLocationId = $location->getContentInfo()->getMainLocationId();

        switch ($mainLocationId) {
            case $location->id:
            case null:
                $this->locationServiceMock->expects(self::never())
                    ->method('loadLocation');
                break;
            case self::UNAUTHORIZED_MAIN_LOCATION_ID:
                $this->locationServiceMock->expects(self::once())
                    ->method('loadLocation')
                    ->with($mainLocationId)
                    ->willThrowException(new UnauthorizedException('', ''));
                break;
            default:
                $this->locationServiceMock->expects(self::once())
                    ->method('loadLocation')
                    ->with($mainLocationId)
                    ->willReturn(new Location(['id' => $mainLocationId]));
                break;
        }
    }

    public function getDataForTestVisitLocationAttributesResolvesMainLocation(): iterable
    {
        yield 'same' => [self::MAIN_LOCATION_ID, self::MAIN_LOCATION_ID];

        yield 'empty-main-location' => [null, self::LOCATION_ID];

        yield 'different' => [999, self::LOCATION_ID];

        yield 'unauthorized' => [self::UNAUTHORIZED_MAIN_LOCATION_ID, self::LOCATION_ID];
    }

    protected function internalGetVisitor(): ValueObjectVisitor\Location
    {
        return new ValueObjectVisitor\Location($this->locationServiceMock, $this->contentServiceMock);
    }
}
