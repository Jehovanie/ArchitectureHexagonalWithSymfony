<?php

declare(strict_types=1);

namespace App\Infrastructure\Entity;

use App\Infrastructure\Repository\Book\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $page = null;

    #[ORM\Column(length: 30)]
    private ?string $version = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $uploadedAt = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $author = null;

    #[ORM\Column(length: 50)]
    private ?string $language = null;

    /**
     * @var Collection<int, BookComment>
     */
    #[ORM\OneToMany(targetEntity: BookComment::class, mappedBy: 'bookId', orphanRemoval: true)]
    private Collection $bookComments;

    public function __construct()
    {
        $this->bookComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(int $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUploadedAt(): ?\DateTimeImmutable
    {
        return $this->uploadedAt;
    }

    public function setUploadedAt(\DateTimeImmutable $uploadedAt): static
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): static
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return Collection<int, BookComment>
     */
    public function getBookComments(): Collection
    {
        return $this->bookComments;
    }

    public function addBookComment(BookComment $bookComment): static
    {
        if (!$this->bookComments->contains($bookComment)) {
            $this->bookComments->add($bookComment);
            $bookComment->setBookId($this);
        }

        return $this;
    }

    public function removeBookComment(BookComment $bookComment): static
    {
        if ($this->bookComments->removeElement($bookComment)) {
            // set the owning side to null (unless already changed)
            if ($bookComment->getBookId() === $this) {
                $bookComment->setBookId(null);
            }
        }

        return $this;
    }
}
