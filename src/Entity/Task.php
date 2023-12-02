<?php

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

    #[ORM\OneToOne(mappedBy: 'task', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function __construct()
    {
        $this->createdAt = new \Datetime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle( string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent( string $content): void
    {
        $this->content = $content;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function toggle( bool $flag): void
    {
        $this->isDone = $flag;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setTask(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getTask() !== $this) {
            $user->setTask($this);
        }

        $this->user = $user;

        return $this;
    }
}
