<?php

declare(strict_types=1);

namespace App\Application\Service\Book;

use App\Domain\Model\Book as BookModel;
use App\Domain\Repository\Book\BookRepositoryInterface;

class GetBookService
{
    public function __construct(
        private BookRepositoryInterface $bookRepository
    ) {
    }

    public function execute($bookId): BookModel
    {
        return $this->bookRepository->findById($bookId);
    }
}
