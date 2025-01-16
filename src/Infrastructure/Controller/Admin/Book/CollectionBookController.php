<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Admin\Book;

use App\Application\Service\Book\GetBookCollectionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin', name: 'app.admin.book.')]
class CollectionBookController extends AbstractController
{
    #[Route('/collection/book', name: 'collection')]
    public function appAdminCreateBook(
        GetBookCollectionService $getBookCollectionService
    ): Response {

        $all_books = $getBookCollectionService->execute();

        return $this->render('admin/book/collection.html.twig', [
            'all_books' => $all_books,
        ]);
    }
}
