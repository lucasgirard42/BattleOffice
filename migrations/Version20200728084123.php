<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200728084123 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, delivery_adress_id INT DEFAULT NULL, country_id INT DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, additional_adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postal LONGTEXT DEFAULT NULL, phone LONGTEXT DEFAULT NULL, email LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455C0E3B53E (delivery_adress_id), INDEX IDX_C7440455F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, countries VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE delivery_adress (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, firstname VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, additionnal_adress VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, postal LONGTEXT DEFAULT NULL, phone LONGTEXT DEFAULT NULL, INDEX IDX_42FD3E30F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, product_id INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, update_at DATETIME DEFAULT NULL, payment_status VARCHAR(255) DEFAULT NULL, INDEX IDX_F529939819EB6921 (client_id), INDEX IDX_F52993984584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, price INT DEFAULT NULL, promo DOUBLE PRECISION DEFAULT NULL, sell_number INT DEFAULT NULL, offer_number INT DEFAULT NULL, is_popular TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455C0E3B53E FOREIGN KEY (delivery_adress_id) REFERENCES delivery_adress (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE delivery_adress ADD CONSTRAINT FK_42FD3E30F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993984584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939819EB6921');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455F92F3E70');
        $this->addSql('ALTER TABLE delivery_adress DROP FOREIGN KEY FK_42FD3E30F92F3E70');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455C0E3B53E');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993984584665A');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE delivery_adress');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE product');
    }
}
