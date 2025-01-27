<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Book;

use App\Domain\Model\BookComment as BookCommentModel;
use App\Domain\Repository\Book\BookCommentRepositoryInterface;
use App\Infrastructure\Entity\BookComment;
use App\Infrastructure\Mapper\BookCommentMapper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookCommentRepository extends ServiceEntityRepository implements BookCommentRepositoryInterface
{
    public $bookMapper;
    public $entityManager;

    public function __construct(
        ManagerRegistry $registry,
        BookCommentMapper $bookCommentMapper,
        EntityManagerInterface $entityManagerInterface
    ) {
        parent::__construct($registry, BookComment::class);

        $this->bookCommentMapper = $bookCommentMapper;
        $this->entityManager = $entityManagerInterface;
    }

    public function saveBookComment(BookCommentModel $bookCommentModel): ?BookCommentModel
    {
        $book_comment_entity = $this->bookCommentMapper->toEntity($bookCommentModel);

        $this->entityManager->persist($book_comment_entity);
        $this->entityManager->flush();

        return $bookCommentModel;
    }
}
