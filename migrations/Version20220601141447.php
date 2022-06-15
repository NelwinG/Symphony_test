<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601141447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE test_products (id INT AUTO_INCREMENT NOT NULL, idproduct INT NOT NULL, create_date DATETIME NOT NULL, create_iduser INT DEFAULT NULL, update_date DATETIME NOT NULL, update_iduser INT DEFAULT NULL, product_name VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, prex_tax_price INT DEFAULT NULL, vat INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE Products');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Products (idproduct INT UNSIGNED AUTO_INCREMENT NOT NULL, create_date DATETIME NOT NULL, create_iduser INT UNSIGNED NOT NULL, update_date DATETIME NOT NULL, update_iduser INT UNSIGNED NOT NULL, product_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, pre-tax price INT NOT NULL, VAT INT NOT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(idproduct)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE test_products');
    }
}
