<?php

namespace App\Tests\Unit\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    const USER_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir un nom d\'utilisateur.';
    const EMAIL_BLANK_VALIDATION_MESSAGE = 'Vous devez saisir une adresse email.';
    const EMAIL_INVALID_FORMAT_VALIDATION_MESSAGE = 'Le format de l\'adresse email n\'est pas correcte !';
    public function testUsernameShouldReturnBlankValidationMessage(): void
    {
        $user = new User();
        $user->setUsername("");
        $validator = self::getContainer()->get('validator');
        $this->assertEquals(self::USER_BLANK_VALIDATION_MESSAGE, $validator->validateProperty($user, 'username')->get(0)->getMessage());
    }

    public function testEmailShouldReturnBlankValidationMessage(): void
    {
        $user = new User();
        $user->setEmail("");
        $validator = self::getContainer()->get('validator');
        $this->assertEquals(self::EMAIL_BLANK_VALIDATION_MESSAGE, $validator->validateProperty($user, 'email')->get(0)->getMessage());
    }

    public function testEmailShouldReturnInvalidFormatValidationMessage(): void
    {
        $user = new User();
        $user->setEmail("fra@");
        $validator = self::getContainer()->get('validator');
        $this->assertEquals(self::EMAIL_INVALID_FORMAT_VALIDATION_MESSAGE, $validator->validateProperty($user, 'email')->get(0)->getMessage());
    }
}
