<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Admin\Book;

use App\Application\DTO\BookDTO;
use App\Application\Service\Book\AddBookService;
use App\Infrastructure\Form\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin', name: 'app.admin.book.')]
class AddBookController extends AbstractController
{
    #[Route('/create/book', name: 'create', methods: ['GET', 'POST'])]
    public function appAdminCreateBook(
        Request $request,
        AddBookService $addBookService
    ): Response {

        // Instancier un DTO pour le formulaire
        $bookDTO = new BookDTO();

        // Créer le formulaire
        $form = $this->createForm(BookType::class, $bookDTO);
        $form->handleRequest($request);

        // Vérifier si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            $addBookService->execute($bookDTO);

            // Rediriger ou afficher un message de succès
            return $this->redirectToRoute('app.admin.book.collection');
        }


        return $this->render('admin/book/create_book.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
