<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Model\Book as BookModel;
use App\Domain\Repository\BookRepositoryInterface;
use App\Infrastructure\Entity\Book as BookEntity;
use App\Infrastructure\Mapper\BookMapper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository implements BookRepositoryInterface
{
    public $bookMapper;

    public function __construct(ManagerRegistry $registry, BookMapper $bookMapper)
    {
        parent::__construct($registry, BookEntity::class);

        $this->bookMapper = $bookMapper;
    }

    public function findById(int $id): ?BookModel
    {
        $book_entity = $this->find(BookEntity::class, $id);

        return $this->bookMapper->toModel($book_entity);
    }

    public function saveBook(BookModel $bookModel): void
    {
        $book_entity = $this->bookMapper->toEntity($bookModel);

        $this->entityManager->persist($book_entity);
        $this->entityManager->flush();
    }

    //    /**
    //     * @return Book[] Returns an array of Book objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Book
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
