<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ibexa\Tests\Core\MVC\Symfony\Security;

use Ibexa\Contracts\Core\Repository\Values\Content\ContentInfo;
use Ibexa\Contracts\Core\Repository\Values\User\User as APIUser;
use Ibexa\Core\MVC\Symfony\Security\ReferenceUserInterface;
use Ibexa\Core\MVC\Symfony\Security\User;
use Ibexa\Core\Repository\Values\User\UserReference;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testConstruct()
    {
        $login = 'my_username';
        $passwordHash = 'encoded_password';
        $apiUser = $this
            ->getMockBuilder(APIUser::class)
            ->setConstructorArgs(
                [
                    [
                        'login' => $login,
                        'passwordHash' => $passwordHash,
                        'enabled' => true,
                    ],
                ]
            )
            ->setMethods(['getUserId'])
            ->getMockForAbstractClass();

        $roles = ['ROLE_USER'];
        $apiUser
            ->expects($this->once())
            ->method('getUserId')
            ->will($this->returnValue(42));

        $user = new User($apiUser, $roles);
        $this->assertSame($apiUser, $user->getAPIUser());
        $this->assertSame($login, $user->getUsername());
        $this->assertSame($passwordHash, $user->getPassword());
        $this->assertSame($roles, $user->getRoles());
        $this->assertNull($user->getSalt());
    }

    public function testIsEqualTo()
    {
        $userId = 123;
        $apiUser = $this->createMock(APIUser::class);
        $apiUser
            ->expects($this->once())
            ->method('getUserId')
            ->will($this->returnValue($userId));
        $roles = ['ROLE_USER'];

        $user = new User($apiUser, $roles);

        $apiUser2 = $this->createMock(APIUser::class);
        $apiUser2
            ->expects($this->once())
            ->method('getUserId')
            ->will($this->returnValue($userId));
        $user2 = new User($apiUser2, []);

        $this->assertTrue($user->isEqualTo($user2));
    }

    public function testIsNotEqualTo()
    {
        $apiUser = $this->createMock(APIUser::class);
        $apiUser
            ->expects($this->once())
            ->method('getUserId')
            ->will($this->returnValue(123));
        $roles = ['ROLE_USER'];

        $user = new User($apiUser, $roles);

        $apiUser2 = $this->createMock(APIUser::class);
        $apiUser2
            ->expects($this->once())
            ->method('getUserId')
            ->will($this->returnValue(456));
        $user2 = new User($apiUser2, []);

        $this->assertFalse($user->isEqualTo($user2));
    }

    public function testIsEqualToNotSameUserType()
    {
        $user = new User($this->createMock(APIUser::class));
        $user2 = $this->createMock(ReferenceUserInterface::class);
        $user2
            ->expects($this->once())
            ->method('getAPIUserReference')
            ->willReturn(new UserReference(456));
        $this->assertFalse($user->isEqualTo($user2));
    }

    public function testSetAPIUser()
    {
        $apiUserA = $this->createMock(APIUser::class);
        $apiUserB = $this->createMock(APIUser::class);

        $user = new User($apiUserA);
        $user->setAPIUser($apiUserB);
        $this->assertSame($apiUserB, $user->getAPIUser());
    }

    public function testToString(): void
    {
        $fullName = 'My full name';
        $userContentInfo = $this->createMock(ContentInfo::class);

        $userContentInfo
            ->method('getName')
            ->willReturn($fullName);

        $apiUser = $this->createMock(APIUser::class);
        $apiUser
            ->method('getContentInfo')
            ->willReturn($userContentInfo);

        $user = new User($apiUser);
        self::assertSame($fullName, (string)$user);
    }
}

class_alias(UserTest::class, 'eZ\Publish\Core\MVC\Symfony\Security\Tests\UserTest');
