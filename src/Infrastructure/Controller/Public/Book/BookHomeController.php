<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Public\Book;

use App\Application\Service\Book\GetBookCollectionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book', name: 'app.book.')]
class BookHomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(
        GetBookCollectionService $getBookCollectionService
    ): Response {

        $books = $getBookCollectionService->execute();

        return $this->render('public/book/index.html.twig', [
            'books' => $books,
        ]);
    }
}
