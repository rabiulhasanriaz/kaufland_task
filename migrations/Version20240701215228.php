<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240701215228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE process_xmlentity (id INT AUTO_INCREMENT NOT NULL, entity_id INT NOT NULL, category_name VARCHAR(255) NOT NULL, sku VARCHAR(255) NOT NULL, name LONGTEXT NOT NULL, description LONGTEXT DEFAULT NULL, shortdesc LONGTEXT DEFAULT NULL, price NUMERIC(10, 4) NOT NULL, link LONGTEXT NOT NULL, image LONGTEXT NOT NULL, brand VARCHAR(255) NOT NULL, rating INT NOT NULL, caffeine_type VARCHAR(255) DEFAULT NULL, count INT DEFAULT NULL, flavored TINYINT(1) NOT NULL, seasonal TINYINT(1) NOT NULL, instock TINYINT(1) NOT NULL, facebook TINYINT(1) NOT NULL, iskcup TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE process_xmlentity');
    }
}
