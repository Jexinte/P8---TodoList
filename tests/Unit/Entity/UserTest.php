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
        $this->getUser()->setUsername('Test');
        $this->assertSame('Test', $this->getUser()->getUsername());
    }

    public function testPasswordShouldReturnSameValue(): void
    {
        $this->getUser()->setPassword('0000');
        $this->assertSame('0000', $this->getUser()->getPassword());
    }

    public function testEmailShouldReturnSameValue(): void
    {
        $this->getUser()->setEmail('johndoe@gmail.com');
        $this->assertSame('johndoe@gmail.com', $this->getUser()->getEmail());
    }

    public function testUserGroupShouldReturnSameValue(): void
    {
        $this->getUser()->setUserGroup("ROLE_USER");
        $this->assertSame("ROLE_USER", $this->getUser()->getUserGroup());
    }


    public function testRolesShouldBeEmpty(): void
    {
        $this->assertEmpty($this->getUser()->getRoles());
    }

}
