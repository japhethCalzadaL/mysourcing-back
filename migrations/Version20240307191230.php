<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307191230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE DATABASE IF NOT EXISTS mysourcing');
        $this->addSql('USE mysourcing'); 
        $this->addSql('
        CREATE TABLE users (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(125) NOT NULL,
            last_name VARCHAR(125) NOT NULL,
            last_second_name VARCHAR(125) NOT NULL,
            email VARCHAR(125) NOT NULL,
            phone VARCHAR(10) NOT NULL,
            postal_code VARCHAR(5) NOT NULL,
            state VARCHAR(125) NOT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE users');
    }
}
