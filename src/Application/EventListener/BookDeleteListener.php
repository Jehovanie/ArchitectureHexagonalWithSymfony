<?php

declare(strict_types=1);

namespace App\Application\EventListener;

use App\Domain\Event\BookDeleteEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class BookDeleteListener
{
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    public function __construct(MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function __invoke(BookDeleteEvent $event): void
    {
        // Exemple : Envoi d'un email à tous les abonnés
        $email = (new Email())
            ->from('no-reply@example.com')
            ->to('subscriber@example.com') // Cela peut être une boucle pour envoyer à plusieurs
            ->subject('A book has been deleted!')
            ->text(sprintf('A book "%s" is deleted by "%s".', $event->getTitle(), $event->getAuthor()));

        $this->mailer->send($email);

        // Loguer l'événement pour le suivi
        $this->logger->info(sprintf('Notification sent for book: %s', $event->getTitle()));
    }
}
