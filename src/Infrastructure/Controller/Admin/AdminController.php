<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin', name: 'app.admin.')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function appAdminCreateBook(
    ): Response {

        return $this->render('admin/book/index.html.twig', [
        ]);
    }
}
