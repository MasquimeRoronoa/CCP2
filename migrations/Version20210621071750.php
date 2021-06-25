<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210621071750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, nom_categories VARCHAR(100) NOT NULL, desc_courte_categories VARCHAR(255) NOT NULL, desc_longue_categories LONGTEXT NOT NULL, logo_categories VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(100) NOT NULL, prenom_contact VARCHAR(100) NOT NULL, mail_contact VARCHAR(255) NOT NULL, date_contact DATETIME NOT NULL, sujet_contact VARCHAR(255) NOT NULL, message_contact LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photographe (id INT AUTO_INCREMENT NOT NULL, nom_photographe VARCHAR(100) NOT NULL, prenom_photographe VARCHAR(100) NOT NULL, mail_photographe VARCHAR(255) NOT NULL, logo_photographe VARCHAR(255) NOT NULL, desc_photographe LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photos (id INT AUTO_INCREMENT NOT NULL, photo LONGTEXT NOT NULL, titre_photo VARCHAR(100) NOT NULL, dimension_photo VARCHAR(20) DEFAULT NULL, date_photo DATETIME DEFAULT NULL, vitesse_photo VARCHAR(10) DEFAULT NULL, ouverture_photo VARCHAR(10) DEFAULT NULL, iso_photo VARCHAR(5) DEFAULT NULL, focale_photo VARCHAR(10) DEFAULT NULL, objectif_photo VARCHAR(255) DEFAULT NULL, appareil_photo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE techniques (id INT AUTO_INCREMENT NOT NULL, nom_technique VARCHAR(100) NOT NULL, desc_courte_technique VARCHAR(255) NOT NULL, desc_longue_technique LONGTEXT NOT NULL, logo_technique VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE photographe');
        $this->addSql('DROP TABLE photos');
        $this->addSql('DROP TABLE techniques');
    }
}
