<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;
#[UniqueEntity('email')]
#[ORM\Table('user')]
#[ORM\Entity]
class User implements UserInterface,PasswordAuthenticatedUserInterface
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private $id;

    #[Assert\NotBlank(message: "Vous devez saisir un nom d'utilisateur.")]
    #[ORM\Column(type: 'string', length: 25, unique: true)]
    private $username;

    #[ORM\Column(type: 'string', length: 64)]
    private $password;

    #[Assert\NotBlank(message: 'Vous devez saisir une adresse email.')]
    #[Assert\Email(message: "Le format de l'adresse n'est pas correcte.")]
    #[ORM\Column(type: 'string', length: 60, unique: true)]
    private $email;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername():string
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getSalt():?string
    {
        return null;
    }



    public function setPassword($password): void
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getRoles():array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials():void
    {
    }

    public function getUserIdentifier(): string
    {
     return  $this->username;
    }

    public function getPassword() : string
    {
        return $this->password;
    }
}
