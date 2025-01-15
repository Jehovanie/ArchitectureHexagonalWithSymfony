<?php

declare(strict_types=1);

namespace App\Infrastructure\Mapper;

use App\Domain\Model\Book as BookModel;
use App\Infrastructure\Entity\Book as BookEntity;

final class BookMapper
{
    public function toEntity(BookModel $bookModel): BookEntity
    {

        $sourceReflection = new \ReflectionClass($bookModel);

        $book = new BookEntity();
        $targetReflection = new \ReflectionClass($book);

        foreach ($sourceReflection->getProperties() as $property) {
            $property->setAccessible(true);
            $name = $property->getName();

            // Vérifiez si la propriété existe dans la classe cible
            if ($targetReflection->hasProperty($name)) {
                $targetProperty = $targetReflection->getProperty($name);
                $targetProperty->setAccessible(true);
                $targetProperty->setValue($book, $property->getValue($bookModel));
            }
        }

        return $book;
    }

    public function toModel(BookEntity $bookEntity): BookModel
    {
        return new BookModel(
            id : $bookEntity->getId(),
            title : $bookEntity->getTitle(),
            description : $bookEntity->getDescription(),
            page : $bookEntity->getPage(),
            version : $bookEntity->getVersion(),
            createdAt: $bookEntity->getCreatedAt(),
            uploadedAt: $bookEntity->getUploadedAt(),
            author : $bookEntity->getAuthor(),
            language : $bookEntity->getLanguage()
        );
    }
}
