<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;
#[UniqueEntity('email',message: 'Veuillez choisir une autre adresse email !')]
#[UniqueEntity('username',message: 'Veuillez choisir un autre nom utilisateur !')]
#[ORM\Table('user')]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface,PasswordAuthenticatedUserInterface
{
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    private int $id;

    #[Assert\NotBlank(message: "Vous devez saisir un nom d'utilisateur.")]
    #[ORM\Column(type: 'string', length: 25, unique: true)]
    private string $username;

    #[ORM\Column(type: 'string', length: 64)]
    private string $password;

    #[Assert\NotBlank(message: 'Vous devez saisir une adresse email.')]
    #[Assert\Email(message: "Le format de l'adresse n'est pas correcte.")]
    #[ORM\Column(type: 'string', length: 60, unique: true)]
    private string $email;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Task $task = null;
    /**
     * @var array<string>
     */
    #[ORM\Column(type: 'json')]
    private array $roles = [];

    private string $userGroup;

    public function getId(): int
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

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getSalt():?string
    {
        return null;
    }



    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail( string $email): void
    {
        $this->email = $email;
    }

    public function getRoles():array
    {
        return $this->roles;
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

    public function getTask(): ?Task
    {
        return $this->task;
    }

    public function setTask(?Task $task): static
    {
        $this->task = $task;

        return $this;
    }

    /**
     * @param array<string> $roles
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getUserGroup(): string
    {
        return $this->userGroup;
    }

    public function setUserGroup(string $userGroup): void
    {
        $this->userGroup = $userGroup;
    }
}
