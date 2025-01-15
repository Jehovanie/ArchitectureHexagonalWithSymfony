<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250115150758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Complete entity book';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book ADD description LONGTEXT NOT NULL, ADD page INT NOT NULL, ADD version VARCHAR(30) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD uploaded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD author VARCHAR(150) DEFAULT NULL, ADD language VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book DROP description, DROP page, DROP version, DROP created_at, DROP uploaded_at, DROP author, DROP language');
    }
}
