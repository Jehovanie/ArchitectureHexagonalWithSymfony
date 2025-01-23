<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{
    public function testCreateBookPage(): void
    {
        $client = static::createClient();

        // Charger la page de création
        $crawler = $client->request('GET', '/book/create');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create a Book');

        // Remplir le formulaire
        $form = $crawler->selectButton('Submit')->form([
            'book[title]' => 'Clean Code',
            'book[author]' => 'Robert C. Martin',
        ]);

        $client->submit($form);

        // Vérifier la redirection après la création
        $this->assertResponseRedirects('/book/list');
    }
}
