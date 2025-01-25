<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository\Book;

use App\Domain\Model\Book as BookModel;
use App\Domain\Repository\Book\BookRepositoryInterface;
use App\Infrastructure\Entity\Book as BookEntity;
use App\Infrastructure\Mapper\BookMapper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 */
class BookRepository extends ServiceEntityRepository implements BookRepositoryInterface
{
    public $bookMapper;
    public $entityManager;

    public function __construct(
        ManagerRegistry $registry,
        BookMapper $bookMapper,
        EntityManagerInterface $entityManagerInterface
    ) {
        parent::__construct($registry, BookEntity::class);

        $this->bookMapper = $bookMapper;
        $this->entityManager = $entityManagerInterface;
    }

    public function findById(int $id): ?BookModel
    {
        $book_entity = $this->find($id);

        if (!$book_entity) {
            return null;
        }

        return $this->bookMapper->toModel($book_entity);
    }

    public function saveBook(BookModel $bookModel): BookModel
    {
        $book_entity = $this->bookMapper->toEntity($bookModel);

        $this->entityManager->persist($book_entity);
        $this->entityManager->flush();

        return $this->bookMapper->toModel($book_entity);
    }

    /**
     * @return BookModel[]
     */
    public function findAllBook(): array
    {
        $book_entities = $this->findAll();

        return array_map(function (BookEntity $book_entity) {
            return $this->bookMapper->toModel($book_entity);
        }, $book_entities);
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
