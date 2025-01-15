<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use App\Domain\Event\BookCreatedEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class BookCreatedListener
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function __invoke(BookCreatedEvent $event): void
    {
        // Exemple : Envoi d'un email à tous les abonnés
        $email = (new Email())
            ->from('no-reply@example.com')
            ->to('subscriber@example.com') // Cela peut être une boucle pour envoyer à plusieurs
            ->subject('A new book has been created!')
            ->text(sprintf('A new book "%s" by %s is now available.', $event->getTitle(), $event->getAuthor()));

        $this->mailer->send($email);

        // Loguer l'événement pour le suivi
        $this->logger->info(sprintf('Notification sent for book: %s', $event->getTitle()));
    }
}
