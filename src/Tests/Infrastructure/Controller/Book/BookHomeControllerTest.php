<?php

declare(strict_types=1);

namespace App\Tests\Infrastructure\Controller\Book;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookHomeControllerTest extends WebTestCase
{
    public function testBookHomeControllerTest(): void
    {
        $client = static::createClient();

        // Charger la page de création
        $client->request('GET', '/book/home');

        $this->assertResponseIsSuccessful();
    }
}
