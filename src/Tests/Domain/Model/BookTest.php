<?php

declare(strict_types=1);

namespace App\Tests\Domain\Model;

use App\Domain\Model\Book as BookModel;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testCreateBook(): void
    {
        $book = new BookModel(
            id:1,
            title: 'Clean Code',
            description : 'Robert C. Martin',
            page: 45,
            version : '1',
            createdAt: new \DateTimeImmutable(),
            uploadedAt: new \DateTimeImmutable(),
            author: 'Robert C. Martin',
            language:  'English',
        );

        $this->assertSame(1, $book->getId());
        $this->assertSame('Clean Code', $book->getTitle());
        $this->assertSame('Robert C. Martin', $book->getAuthor());
    }

    public function testUpdateTitle(): void
    {
        $book = new BookModel(
            id:1,
            title: 'Clean Code',
            description : 'Robert C. Martin',
            page: 45,
            version : '1',
            createdAt: new \DateTimeImmutable(),
            uploadedAt: new \DateTimeImmutable(),
            author: 'Robert C. Martin',
            language:  'English',
        );

        $book->setTitle('Clean Architecture');

        $this->assertSame('Clean Architecture', $book->getTitle());
    }
}
