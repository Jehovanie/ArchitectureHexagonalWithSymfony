<?php

declare(strict_types=1);

namespace App\Domain\Repository\Book;

use App\Domain\Model\BookComment as BookCommentModel;

interface BookCommentRepositoryInterface
{
    public function saveBookComment(BookCommentModel $bookCommentModel): ?BookCommentModel;
}
