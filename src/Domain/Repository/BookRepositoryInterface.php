<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Book as BookModel;

interface BookRepositoryInterface
{
    public function findAll(): array;

    public function findById(int $id): ?BookModel;

    public function saveBook(BookModel $bookModel): void;
}
