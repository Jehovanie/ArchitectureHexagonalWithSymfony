<?php

declare(strict_types=1);

namespace App\Application\Service\Book;

use App\Application\DTO\BookDTO;
use App\Domain\Event\BookCreatedEvent;
use App\Domain\Model\Book as BookModel;
use App\Domain\Repository\BookRepositoryInterface;
use App\Infrastructure\Mapper\BookMapper;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class AddBookService
{
    public function __construct(
        private BookRepositoryInterface $bookRepository,
        private BookMapper $bookMapper,
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function execute(BookDTO $bookDTO): void
    {
        $book = new BookModel(
            id: null, 
            title: $bookDTO->title,
            description : $bookDTO->description,
            page : $bookDTO->page,
            version : $bookDTO->version,
            createdAt: $bookDTO->createdAt,
            uploadedAt: $bookDTO->uploadedAt,
            author : $bookDTO->author,
            language : $bookDTO->language
        );

        $new_book = $this->bookRepository->saveBook($book);

        $this->pushNotificationCreateBook($new_book);
    }

    public function pushNotificationCreateBook(BookModel $new_book)
    {
        $event = new BookCreatedEvent($new_book->getId(), $new_book->getTitle(), 'jehovanieram@gmail.com');
        $this->eventDispatcher->dispatch($event, BookCreatedEvent::class);
    }
}
