<?php

declare(strict_types=1);

namespace App\Domain\Event;

class BookCreatedEvent
{
    private ?int $bookId;
    private string $title;
    private string $author;

    public function __construct(?int $bookId, string $title, string $author)
    {
        $this->bookId = $bookId;
        $this->title = $title;
        $this->author = $author;
    }

    public function getBookId(): ?int
    {
        return $this->bookId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }
}
