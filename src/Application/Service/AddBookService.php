<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Model\Book as BookModel;
use App\Domain\Repository\BookRepositoryInterface;
use App\Infrastructure\Mapper\BookMapper;

class AddBookService
{
    public function __construct(
        private BookRepositoryInterface $bookRepository,
        private BookMapper $bookMapper
    ) {
    }

    public function execute(int $id, string $title): void
    {
        $book = new BookModel($id, $title);

        $this->bookRepository->saveBook($book);
    }
}
