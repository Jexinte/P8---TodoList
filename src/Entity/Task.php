<?php

/**
 * PHP version 8.
 *
 * @category Entity
 * @package  Task
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table]
#[ORM\Entity]
class Task
{
    /**
     * @var int
     */
    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $createdAt;

    #[Assert\NotBlank(message: 'Vous devez saisir un titre.')]
    #[ORM\Column(type: 'string')]
    private string $title;


    #[Assert\NotBlank(message: 'Vous devez saisir du contenu.')]
    #[ORM\Column(type: 'text')]
    private string $content;

    #[ORM\Column(type: 'boolean')]
    private bool $isDone = false;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user = null;


    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->createdAt = new \Datetime();
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
     * Summary of getCreatedAt
     *
     * @return \Datetime
     */
    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    /**
     * Summary of setCreatedAt
     *
     * @param \DateTime $createdAt Object
     *
     * @return void
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Summary of getTitle
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Summary of setTitle
     *
     * @param string $title string
     *
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Summary of getContent
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Summary of setContent
     *
     * @param string $content string
     *
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Summary of isDone
     *
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->isDone;
    }

    /**
     * Summary of toggle
     *
     * @param bool $flag bool
     *
     * @return void
     */
    public function toggle(bool $flag): void
    {
        $this->isDone = $flag;
    }

    /**
     * Summary of getUser
     *
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Summary of setUser
     *
     * @param User|null $user Object
     *
     * @return $this
     */
    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }


}
