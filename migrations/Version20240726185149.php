<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240726185149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, genres VARCHAR(255) NOT NULL, year INT NOT NULL, director VARCHAR(255) NOT NULL, main_actors VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, synopsis LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film_stars (film_id INT NOT NULL, stars_id INT NOT NULL, INDEX IDX_98713E7C567F5183 (film_id), INDEX IDX_98713E7CFFEAC122 (stars_id), PRIMARY KEY(film_id, stars_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stars (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE film_stars ADD CONSTRAINT FK_98713E7C567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE film_stars ADD CONSTRAINT FK_98713E7CFFEAC122 FOREIGN KEY (stars_id) REFERENCES stars (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE film_stars DROP FOREIGN KEY FK_98713E7C567F5183');
        $this->addSql('ALTER TABLE film_stars DROP FOREIGN KEY FK_98713E7CFFEAC122');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE film_stars');
        $this->addSql('DROP TABLE stars');
        $this->addSql('DROP TABLE users');
    }
}
