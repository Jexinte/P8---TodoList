<?php

namespace App\Tests\Unit\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function getUser(): User
    {
        return new User();
    }

    public function testUsernameShouldReturnSameValue(): void
    {
        $user = new User();
        $user->setUsername('Test');
        $this->assertSame('Test', $user->getUsername());
    }

    public function testPasswordShouldReturnSameValue(): void
    {
        $user = new User();
        $user->setPassword('0000');
        $this->assertSame('0000', $user->getPassword());
    }

    public function testEmailShouldReturnSameValue(): void
    {
        $user = new User();
        $user->setEmail('johndoe@gmail.com');
        $this->assertSame('johndoe@gmail.com', $user->getEmail());
    }

    public function testUserGroupShouldReturnSameValue(): void
    {
        $user = new User();
        $user->setUserGroup("ROLE_USER");
        $this->assertSame("ROLE_USER", $user->getUserGroup());
    }


    public function testRolesShouldBeEmpty(): void
    {
        $user = new User();
        $this->assertEmpty($user->getRoles());
    }

}
