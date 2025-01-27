<?php

declare(strict_types=1);

namespace App\Infrastructure\DataFixtures;

use App\Infrastructure\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BookFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create(); // Utilisation de Faker pour générer des données aléatoires

        for ($i = 0; $i < 10; ++$i) {
            $book = new Book();

            $book->setTitle($faker->sentence(3)); // Génère un titre aléatoire
            $book->setDescription($faker->paragraph(5)); // Génère une description aléatoire
            $book->setPage($faker->numberBetween(50, 500)); // Génère un nombre aléatoire de pages
            $book->setVersion($faker->randomElement(['1.0', '2.0', '3.0'])); // Génère une version aléatoire
            $book->setCreatedAt(new \DateTimeImmutable($faker->dateTimeThisYear()->format('Y-m-d H:i:s'))); // Génère une date aléatoire cette année
            $book->setUploadedAt(new \DateTimeImmutable($faker->dateTimeThisYear()->format('Y-m-d H:i:s'))); // Génère une autre date aléatoire
            $book->setAuthor($faker->name); // Génère un nom d'auteur
            $book->setLanguage($faker->randomElement(['English', 'French', 'German', 'Spanish'])); // Génère une langue aléatoire

            $manager->persist($book); // Prépare l'entité pour l'insertion dans la base de données
        }

        $manager->flush(); // Sauvegarde les données dans la base de données
    }
}
