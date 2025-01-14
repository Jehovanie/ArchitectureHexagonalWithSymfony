<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Domain\Repository\BookRepositoryInterface;

class GetBookCollectionService
{
    public function __construct(
        private BookRepositoryInterface $bookRepository
    ) {
    }

    public function execute(): array
    {
        return $this->bookRepository->findAll();
    }
}
