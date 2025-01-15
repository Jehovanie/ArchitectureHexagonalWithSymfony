<?php

declare(strict_types=1);

namespace App\Domain\Event;

class BookDeleteEvent
{
    private string $bookId;
    private string $title;
    private string $author;

    public function __construct(string $bookId, string $title, string $author)
    {
        $this->bookId = $bookId;
        $this->title = $title;
        $this->author = $author;
    }

    public function getBookId(): string
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
