<?php

declare(strict_types=1);

namespace App\Application\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class BookCommentDTO
{
    #[Assert\NotBlank]
    public int $bookId;

    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 50)]
    public string $author;


    #[Assert\NotBlank]
    public string $comment;

    public \DateTimeImmutable $createdAt;

    public \DateTimeImmutable $uploadedAt;
}
