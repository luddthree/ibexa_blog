<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace Ibexa\Tests\Personalization\Helper;

use Ibexa\Personalization\Helper\ParamsConverterHelper;
use PHPUnit\Framework\TestCase;

class ParamsConverterHelperTest extends TestCase
{
    /**
     * @dataProvider stringLists
     */
    public function testGetIdListFromString($input, $expected)
    {
        $result = ParamsConverterHelper::getIdListFromString($input);

        $this->assertEquals($expected, $result);
        $this->assertIsArray($result);
    }

    public function stringLists()
    {
        return [
            ['123', [123]],
            ['123,456', [123, 456]],
            ['12,34,56', [12, 34, 56]],
        ];
    }

    public function testGetIdListFromStringWithoutSeparator()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('String should be a list of Integers');

        ParamsConverterHelper::getIdListFromString('1abcd');
    }

    public function testGetIdListFromStringWitInvalidArgument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('String should be a list of Integers');

        ParamsConverterHelper::getIdListFromString('123,abc,456');
    }

    public function getArrayFromStringDataProvider()
    {
        return [
            ['123', ['123']],
            ['123,456', ['123', '456']],
            ['12,34,56', ['12', '34', '56']],
            ['ab', ['ab']],
            ['ab,bc', ['ab', 'bc']],
        ];
    }

    /**
     * @dataProvider getArrayFromStringDataProvider
     */
    public function testGetArrayFromString($input, $expected)
    {
        $result = ParamsConverterHelper::getArrayFromString($input);

        $this->assertEquals($expected, $result);
        $this->assertIsArray($result);
    }
}

class_alias(ParamsConverterHelperTest::class, 'EzSystems\EzRecommendationClient\Tests\Helper\ParamsConverterHelperTest');
