<?php

declare(strict_types=1);

namespace App\Application\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class BookDTO
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    public string $title;

    #[Assert\NotBlank]
    public string $description;

    #[Assert\NotBlank]
    public int $page;

    #[Assert\NotBlank]
    public string $version;

    public string $author;

    public string $language;

    public \DateTimeImmutable $createdAt;

    public \DateTimeImmutable $uploadedAt;
}
