<?php

declare(strict_types=1);

namespace App\Tests\Application\Service\Book;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddBookServiceTest extends WebTestCase
{
    public function testCreateBookPage(): void
    {
        $client = static::createClient();

        // Charger la page de création
        $crawler = $client->request('GET', '/admin/create/book');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h4', 'Ajouter une nouvelle book');

        // // Remplir le formulaire
        // $form = $crawler->selectButton('Submit')->form([
        //     'book[title]' => 'Clean Code',
        //     'book[author]' => 'Robert C. Martin',
        // ]);

        // $client->submit($form);

        // Vérifier la redirection après la création
        // $this->assertResponseRedirects('/book/list');
    }
}
