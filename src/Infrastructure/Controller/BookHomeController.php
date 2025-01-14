<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BookHomeController extends AbstractController
{
    #[Route('/book/home', name: 'app_book_home')]
    public function index(): Response
    {
        return $this->render('book_home/index.html.twig', [
            'controller_name' => 'BookHomeController',
        ]);
    }
}
