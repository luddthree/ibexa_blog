<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Tests\Core\Repository\Permission;

use Ibexa\Contracts\Core\Limitation\Type;
use Ibexa\Contracts\Core\Repository\PermissionResolver;
use Ibexa\Contracts\Core\Repository\Values\Content\Query\Criterion;
use Ibexa\Contracts\Core\Repository\Values\User\Limitation;
use Ibexa\Contracts\Core\Repository\Values\User\User;
use Ibexa\Core\Limitation\TargetOnlyLimitationType;
use Ibexa\Core\Repository\Permission\LimitationService;
use Ibexa\Core\Repository\Permission\PermissionCriterionResolver;
use Ibexa\Core\Repository\Values\User\Policy;
use PHPUnit\Framework\TestCase;

/**
 * Mock test case for PermissionCriterionResolver.
 */
class PermissionCriterionResolverTest extends TestCase
{
    public function providerForTestGetPermissionsCriterion()
    {
        $criterionMock = $this
            ->getMockBuilder(Criterion::class)
            ->disableOriginalConstructor()
            ->getMock();
        $limitationMock = $this
            ->getMockBuilder(Limitation::class)
            ->getMockForAbstractClass();
        $limitationMock
            ->expects($this->any())
            ->method('getIdentifier')
            ->will($this->returnValue('limitationIdentifier'));

        $targetOnlyLimitationMock = $this->createMock(Limitation::class);
        $targetOnlyLimitationMock
            ->expects($this->any())
            ->method('getIdentifier')
            ->willReturn('targetOnlyLimitationIdentifier');

        $policy1 = new Policy(['limitations' => [$limitationMock]]);
        $policy2 = new Policy(['limitations' => [$limitationMock, $limitationMock]]);
        $policy3 = new Policy(['limitations' => [$limitationMock, $targetOnlyLimitationMock]]);

        return [
            [
                $criterionMock,
                1,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy1],
                    ],
                ],
                $criterionMock,
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy1, $policy1],
                    ],
                ],
                new Criterion\LogicalOr([$criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                0,
                [
                    [
                        'limitation' => null,
                        'policies' => [new Policy(['limitations' => []]), $policy1],
                    ],
                ],
                false,
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy2],
                    ],
                ],
                new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                3,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy1, $policy2],
                    ],
                ],
                new Criterion\LogicalOr(
                    [
                        $criterionMock,
                        new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
                    ]
                ),
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy1],
                    ],
                    [
                        'limitation' => null,
                        'policies' => [$policy1],
                    ],
                ],
                new Criterion\LogicalOr([$criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                3,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy1],
                    ],
                    [
                        'limitation' => null,
                        'policies' => [$policy1, $policy1],
                    ],
                ],
                new Criterion\LogicalOr([$criterionMock, $criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                3,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy2],
                    ],
                    [
                        'limitation' => null,
                        'policies' => [$policy1],
                    ],
                ],
                new Criterion\LogicalOr(
                    [
                        new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
                        $criterionMock,
                    ]
                ),
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => $limitationMock,
                        'policies' => [$policy1],
                    ],
                ],
                new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                4,
                [
                    [
                        'limitation' => $limitationMock,
                        'policies' => [$policy1],
                    ],
                    [
                        'limitation' => $limitationMock,
                        'policies' => [$policy1],
                    ],
                ],
                new Criterion\LogicalOr(
                    [
                        new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
                        new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
                    ]
                ),
            ],
            [
                $criterionMock,
                1,
                [
                    [
                        'limitation' => $limitationMock,
                        'policies' => [new Policy(['limitations' => []])],
                    ],
                ],
                $criterionMock,
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => $limitationMock,
                        'policies' => [new Policy(['limitations' => []])],
                    ],
                    [
                        'limitation' => $limitationMock,
                        'policies' => [new Policy(['limitations' => []])],
                    ],
                ],
                new Criterion\LogicalOr([$criterionMock, $criterionMock]),
            ],
            [
                $criterionMock,
                2,
                [
                    [
                        'limitation' => null,
                        'policies' => [$policy3],
                    ],
                ],
                new Criterion\LogicalAnd([$criterionMock, $criterionMock]),
            ],
        ];
    }

    protected function mockServices($criterionMock, $limitationCount, $permissionSets)
    {
        $userMock = $this->getMockBuilder(User::class)->getMockForAbstractClass();
        $limitationServiceMock = $this->getLimitationServiceMock(['getLimitationType']);
        $limitationTypeMock = $this->getMockBuilder(Type::class)->getMockForAbstractClass();
        $targetOnlyLimitationTypeMock = $this->createMock(TargetOnlyLimitationType::class);
        $permissionResolverMock = $this->getPermissionResolverMock(
            [
                'hasAccess',
                'getCurrentUserReference',
            ]
        );

        $limitationTypeMock
            ->expects($this->any())
            ->method('getCriterion')
            ->with(
                $this->isInstanceOf(Limitation::class),
                $this->equalTo($userMock)
            )
            ->will($this->returnValue($criterionMock));

        $targetOnlyLimitationTypeMock
            ->expects($this->never())
            ->method('getCriterion');

        $targetOnlyLimitationTypeMock
            ->expects($this->any())
            ->method('getCriterionByTarget')
            ->with(
                $this->isInstanceOf(Limitation::class),
                $this->equalTo($userMock),
                $this->anything()
            )
            ->willReturn($criterionMock);

        $limitationServiceMock
            ->expects($this->exactly($limitationCount))
            ->method('getLimitationType')
            ->willReturnMap([
                ['limitationIdentifier', $limitationTypeMock],
                ['targetOnlyLimitationIdentifier', $targetOnlyLimitationTypeMock],
            ]);

        $permissionResolverMock
            ->expects($this->once())
            ->method('hasAccess')
            ->with($this->equalTo('content'), $this->equalTo('read'))
            ->will($this->returnValue($permissionSets));

        $permissionResolverMock
            ->expects($this->once())
            ->method('getCurrentUserReference')
            ->will($this->returnValue($userMock));
    }

    /**
     * Test for the getPermissionsCriterion() method.
     *
     * @dataProvider providerForTestGetPermissionsCriterion
     */
    public function testGetPermissionsCriterion(
        $criterionMock,
        $limitationCount,
        $permissionSets,
        $expectedCriterion
    ) {
        $this->mockServices($criterionMock, $limitationCount, $permissionSets);
        $criterionResolver = $this->getPermissionCriterionResolverMock(null);

        $permissionsCriterion = $criterionResolver->getPermissionsCriterion('content', 'read', []);

        $this->assertEquals($expectedCriterion, $permissionsCriterion);
    }

    public function providerForTestGetPermissionsCriterionBooleanPermissionSets()
    {
        return [
            [true],
            [false],
        ];
    }

    /**
     * Test for the getPermissionsCriterion() method.
     *
     * @dataProvider providerForTestGetPermissionsCriterionBooleanPermissionSets
     */
    public function testGetPermissionsCriterionBooleanPermissionSets($permissionSets)
    {
        $permissionResolverMock = $this->getPermissionResolverMock(['hasAccess']);
        $permissionResolverMock
            ->expects($this->once())
            ->method('hasAccess')
            ->with($this->equalTo('testModule'), $this->equalTo('testFunction'))
            ->will($this->returnValue($permissionSets));

        $criterionResolver = $this->getPermissionCriterionResolverMock(null);

        $permissionsCriterion = $criterionResolver->getPermissionsCriterion('testModule', 'testFunction');

        $this->assertEquals($permissionSets, $permissionsCriterion);
    }

    /**
     * Returns the PermissionCriterionResolver to test with $methods mocked.
     *
     * @param string[]|null $methods
     *
     * @return \PHPUnit\Framework\MockObject\MockObject|\Ibexa\Core\Repository\Permission\PermissionCriterionResolver
     */
    protected function getPermissionCriterionResolverMock($methods = [])
    {
        return $this
            ->getMockBuilder(PermissionCriterionResolver::class)
            ->setMethods($methods)
            ->setConstructorArgs(
                [
                    $this->getPermissionResolverMock(),
                    $this->getLimitationServiceMock(),
                ]
            )
            ->getMock();
    }

    protected $permissionResolverMock;

    protected function getPermissionResolverMock($methods = [])
    {
        // Tests first calls here with methods set before initiating PermissionCriterionResolver with same instance.
        if ($this->permissionResolverMock !== null) {
            return $this->permissionResolverMock;
        }

        return $this->permissionResolverMock = $this
            ->getMockBuilder(PermissionResolver::class)
            ->setMethods($methods)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
    }

    protected $limitationServiceMock;

    protected function getLimitationServiceMock($methods = [])
    {
        // Tests first calls here with methods set before initiating PermissionCriterionResolver with same instance.
        if ($this->limitationServiceMock !== null) {
            return $this->limitationServiceMock;
        }

        return $this->limitationServiceMock = $this
            ->getMockBuilder(LimitationService::class)
            ->setMethods($methods)
            ->disableOriginalConstructor()
            ->getMock();
    }
}

class_alias(PermissionCriterionResolverTest::class, 'eZ\Publish\Core\Repository\Tests\Permission\PermissionCriterionResolverTest');
