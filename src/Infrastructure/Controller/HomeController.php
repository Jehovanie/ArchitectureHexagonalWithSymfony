<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app.home')]
class HomeController extends AbstractController
{
    public function __invoke()
    {
        return $this->redirectToRoute('app.book.home');
    }
}
