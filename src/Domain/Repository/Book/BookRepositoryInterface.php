<?php

declare(strict_types=1);

namespace App\Domain\Repository\Book;

use App\Domain\Model\Book as BookModel;

interface BookRepositoryInterface
{
    /**
     * @return BookModel[]
     */
    public function findAllBook(): array;

    public function findById(int $id): ?BookModel;

    public function saveBook(BookModel $bookModel): ?BookModel;
}
