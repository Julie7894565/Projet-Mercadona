<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testSetEmail()
    {
        $user = new User();
        $email = 'test@example.com';
        $user->setEmail($email);

        $this->assertEquals($email, $user->getEmail());
    }

    public function testGetRoles()
    {
        $user = new User();
        $roles = ['ROLE_USER'];
        $user->setRoles($roles);

        $this->assertEquals($roles, $user->getRoles());
    }

    public function testSetPassword()
    {
        $user = new User();
        $password = 'password123';
        $user->setPassword($password);

        $this->assertEquals($password, $user->getPassword());
    }
}

