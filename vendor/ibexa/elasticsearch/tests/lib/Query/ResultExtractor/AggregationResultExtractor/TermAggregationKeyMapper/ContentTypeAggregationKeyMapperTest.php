<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Tests\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper;

use Ibexa\Contracts\Core\Repository\ContentTypeService;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Aggregation;
use Ibexa\Contracts\Core\Repository\Values\ContentType\ContentType;
use Ibexa\Elasticsearch\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\ContentTypeAggregationKeyMapper;
use Ibexa\Tests\Elasticsearch\Query\Utils\MockUtils;
use PHPUnit\Framework\TestCase;

final class ContentTypeAggregationKeyMapperTest extends TestCase
{
    private const EXAMPLE_CONTENT_TYPE_IDS = [1, 2, 3];

    /** @var \Ibexa\Contracts\Core\Repository\ContentTypeService|\PHPUnit\Framework\MockObject\MockObject */
    private $contentTypeService;

    protected function setUp(): void
    {
        $this->contentTypeService = $this->createMock(ContentTypeService::class);
    }

    public function testMap(): void
    {
        $expectedContentTypes = $this->createContentTypesList(self::EXAMPLE_CONTENT_TYPE_IDS);

        $this->contentTypeService
            ->method('loadContentTypeList')
            ->with(self::EXAMPLE_CONTENT_TYPE_IDS, [])
            ->willReturn($expectedContentTypes);

        $mapper = new ContentTypeAggregationKeyMapper($this->contentTypeService);

        $this->assertEquals(
            array_combine(
                self::EXAMPLE_CONTENT_TYPE_IDS,
                $expectedContentTypes
            ),
            $mapper->map(
                $this->createMock(Aggregation::class),
                MockUtils::createEmptyLanguageFilter(),
                self::EXAMPLE_CONTENT_TYPE_IDS
            )
        );
    }

    private function createContentTypesList(iterable $ids): array
    {
        $contentTypes = [];
        foreach ($ids as $id) {
            $contentType = $this->createMock(ContentType::class);
            $contentType->method('__get')->with('id')->willReturn($id);

            $contentTypes[] = $contentType;
        }

        return $contentTypes;
    }
}

class_alias(ContentTypeAggregationKeyMapperTest::class, 'Ibexa\Platform\ElasticSearchEngine\Tests\Query\ResultExtractor\AggregationResultExtractor\TermAggregationKeyMapper\ContentTypeAggregationKeyMapperTest');
