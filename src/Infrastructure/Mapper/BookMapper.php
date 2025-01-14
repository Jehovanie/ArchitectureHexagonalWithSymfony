<?php

declare(strict_types=1);

namespace App\Infrastructure\Mapper;

use App\Domain\Model\Book as BookModel;
use App\Infrastructure\Entity\Book as BookEntity;

final class BookMapper
{
    public function toEntity(BookModel $bookModel): BookEntity
    {

        $book = new BookEntity();
        $book->setTitle($bookModel->getTitle());

        return $book;
    }

    public function toModel(BookEntity $book): BookModel
    {

        return new BookModel(
            $book->getId(),
            $book->getTitle()
        );
    }
}
