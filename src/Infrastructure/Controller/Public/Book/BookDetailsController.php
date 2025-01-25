<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Public\Book;

use App\Application\Service\Book\GetBookService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book', name: 'app.book.')]
class BookDetailsController extends AbstractController
{
    #[Route('/detail/{bookId}', name: 'detail')]
    public function index(
        int $bookId,
        GetBookService $getBookService
    ): Response {

        $book = $getBookService->execute($bookId);

        return $this->render('public/book/detail.html.twig', [
            'book' => $book,
        ]);
    }
}
