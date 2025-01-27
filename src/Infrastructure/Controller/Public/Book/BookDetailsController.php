<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Public\Book;

use App\Application\DTO\BookCommentDTO;
use App\Application\Service\Book\AddCommentBookService;
use App\Application\Service\Book\GetBookService;
use App\Infrastructure\Form\BookCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book', name: 'app.book.')]
class BookDetailsController extends AbstractController
{
    #[Route('/detail/{bookId}', name: 'detail')]
    public function index(
        int $bookId,
        GetBookService $getBookService,
        AddCommentBookService $addCommentBookService,
        Request $request
    ): Response {

        $book = $getBookService->execute($bookId);

        $bookCommentDTO = new BookCommentDTO();
        $bookCommentDTO->bookId = $book->getId();

        $form = $this->createForm(BookCommentType::class, $bookCommentDTO);
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            dump($bookCommentDTO);

            $addCommentBookService->execute($bookCommentDTO);

            $book = $getBookService->execute($bookId);
            dd($book);

            // Rediriger ou afficher un message de succès
        }

        return $this->render('public/book/detail.html.twig', [
            'book' => $book,
            'form' => $form->createView(),
        ]);
    }
}
