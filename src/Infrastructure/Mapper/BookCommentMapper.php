<?php

declare(strict_types=1);

namespace App\Infrastructure\Mapper;

use App\Domain\Model\BookComment as BookCommentModel;
use App\Infrastructure\Entity\BookComment as BookCommentEntity;

final class BookCommentMapper
{
    public function toEntity(BookCommentModel $bookCommentModel): BookCommentEntity
    {
        $bookComment = new BookCommentEntity();

        $bookComment->setId($bookCommentModel->getId());
        $bookComment->setAuthor($bookCommentModel->getAuthor());
        $bookComment->setComment($bookCommentModel->getComment());
        $bookComment->setCreatedAt($bookCommentModel->getCreatedAt());
        $bookComment->setUpdatedAt($bookCommentModel->getUpdatedAt());
        $bookComment->setBookId($bookCommentModel->getBookId());

        return $bookComment;
    }

    public function toModel(BookCommentEntity $bookCommentEntity): BookCommentModel
    {
        return new BookCommentModel(
            id : $bookCommentEntity->getId(),
            bookId : $bookCommentEntity->getBookId(),
            author : $bookCommentEntity->getAuthor(),
            comment : $bookCommentEntity->getComment(),
            createdAt: $bookCommentEntity->getCreatedAt(),
            updatedAt: $bookCommentEntity->getUpdatedAt(),
        );
    }
}
