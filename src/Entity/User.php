<?php

/**
 * PHP version 8.
 *
 * @category Entity
 * @package  User
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[UniqueEntity('email', message: 'Veuillez choisir une autre adresse email !')]
#[UniqueEntity('username', message: 'Veuillez choisir un autre nom utilisateur !')]
#[ORM\Table('user')]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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
    #[Assert\Regex(
        pattern: '/^[a-z0-9.-]+@[a-z0-9.-]{2,}\.[a-z]{2,4}$/',
        message: 'Le format de l\'adresse email n\'est pas correcte !',
        match: true
    )]
    #[ORM\Column(type: 'string', length: 60, unique: true)]
    private string $email;


    /**
     * @var array<string>
     */
    #[ORM\Column(type: 'json')]
    private array $roles = [];

    private string $userGroup;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Task::class)]
    private Collection $tasks;

    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->tasks = new ArrayCollection();
    }


    /**
     * Summary of getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Summary of getUsername
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Summary of setUsername
     *
     * @param string $username string
     *
     * @return void
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }


    /**
     * Summary of getSalt
     *
     * @return string|null
     */
    public function getSalt(): ?string
    {
        return null;
    }


    /**
     * Summary of setPassword
     *
     * @param string $password string
     *
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Summary of getEmail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Summary of setEmail
     *
     * @param string $email string
     *
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Summary of getRoles
     *
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }


    /**
     * Summary of eraseCredentials
     *
     * @return void
     */
    public function eraseCredentials(): void
    {
    }

    /**
     * Summary of getUserIdentifier
     *
     * @return string
     */
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    /**
     * Summary of getPassword
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * Summary of setRoles
     *
     * @param array<string> $roles array
     *
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Summary of getUserGroup
     *
     * @return string
     */
    public function getUserGroup(): string
    {
        return $this->userGroup;
    }

    /**
     * Summary of setUserGroup
     *
     * @param string $userGroup string
     *
     * @return void
     */
    public function setUserGroup(string $userGroup): void
    {
        $this->userGroup = $userGroup;
    }

    /**
     * Summary of getTasks
     *
     * @return Collection<int, Task>
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }


    /**
     * Summary of addTask
     *
     * @param Task $task Object
     *
     * @return $this
     */
    public function addTask(Task $task): static
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
            $task->setUser($this);
        }

        return $this;
    }


    /**
     * Summary of removeTask
     *
     * @param Task $task Object
     *
     * @return $this
     */
    public function removeTask(Task $task): static
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getUser() === $this) {
                $task->setUser(null);
            }
        }

        return $this;
    }
}
