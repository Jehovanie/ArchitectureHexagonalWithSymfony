<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller\Book;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddBookControllerTest extends WebTestCase
{
    public function testCreateBookPage(): void
    {
        $client = static::createClient();

        // Charger la page de création
        $crawler = $client->request('GET', '/admin/create/book');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('h4', 'Ajouter une nouvelle book');

        // // Remplir le formulaire
        // $form = $crawler->selectButton('Envoyer')->form([
        //     'book[title]' => 'Clean Code',
        //     'book[description]' => 'Description',
        //     'book[author]' => 'Robert C. Martin',
        //     'book[createdAt]' => '12/01/2024',
        //     'book[language]' => 'Français',
        //     'book[page]' => '45',
        //     'book[version]' => '1er edition',
        // ]);

        // $client->submit($form);

        // // Vérifier la redirection après la création
        // $this->assertResponseRedirects('/admin/collection/book');
    }
}
