<?php

declare(strict_types=1);

namespace App\Application\Service\Book;

use App\Application\DTO\BookCommentDTO;
use App\Domain\Event\BookCreatedEvent;
use App\Domain\Model\Book as BookModel;
use App\Domain\Model\BookComment as BookCommentModel;
use App\Domain\Repository\Book\BookCommentRepositoryInterface;
use App\Infrastructure\Mapper\BookMapper;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class AddCommentBookService
{
    public function __construct(
        private BookCommentRepositoryInterface $bookCommentRepository,
        private BookMapper $bookMapper,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function execute(BookCommentDTO $bookCommentDTO): void
    {
        $book_comment = new BookCommentModel(
            id: null,
            bookId: $bookCommentDTO->bookId,
            author: $bookCommentDTO->author,
            comment : $bookCommentDTO->comment,
            createdAt: $bookCommentDTO->createdAt,
            updatedAt: $bookCommentDTO->updatedAt,
        );

        $new_book_comment = $this->bookCommentRepository->saveBookComment($book_comment);

        // $this->pushNotificationCreateBook($new_book);
    }

    public function pushNotificationCreateBook(BookModel $new_book)
    {
        $event = new BookCreatedEvent($new_book->getId(), $new_book->getTitle(), 'jehovanieram@gmail.com');
        $this->eventDispatcher->dispatch($event, BookCreatedEvent::class);
    }
}
