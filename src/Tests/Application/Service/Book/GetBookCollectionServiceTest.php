<?php

declare(strict_types=1);

namespace App\Tests\Application\Service;

use App\Application\Service\Book\GetBookCollectionService;
use App\Domain\Repository\BookRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GetBookCollectionServiceTest extends TestCase
{
    private $bookRepositoryMock;
    private $getBookCollectionService;

    protected function setUp(): void
    {
        $this->bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $this->getBookCollectionService = new GetBookCollectionService($this->bookRepositoryMock);
    }

    public function testCreateBook(): void
    {
        $all_book = $this->getBookCollectionService->execute();

        $this->assertSame(0, count($all_book));
    }
}
