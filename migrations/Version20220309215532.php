<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309215532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id BIGINT AUTO_INCREMENT NOT NULL, userId BIGINT DEFAULT NULL, sessionId VARCHAR(100) NOT NULL, token VARCHAR(100) NOT NULL, status SMALLINT NOT NULL, subTotal DOUBLE PRECISION NOT NULL, itemDiscount DOUBLE PRECISION NOT NULL, tax DOUBLE PRECISION NOT NULL, shipping DOUBLE PRECISION NOT NULL, total DOUBLE PRECISION NOT NULL, voucher VARCHAR(50) DEFAULT NULL, discount DOUBLE PRECISION NOT NULL, grandTotal DOUBLE PRECISION NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME DEFAULT NULL, extraData TEXT DEFAULT NULL, INDEX idx_order_user (userId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_item (id BIGINT AUTO_INCREMENT NOT NULL, productId BIGINT NOT NULL, sku VARCHAR(100) NOT NULL, price DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION NOT NULL, quantity SMALLINT NOT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME DEFAULT NULL, extraData TEXT DEFAULT NULL, orderId BIGINT DEFAULT NULL, INDEX idx_order_item_order (orderId), INDEX idx_order_item_product (productId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F09FA237437 FOREIGN KEY (orderId) REFERENCES `order` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F09FA237437');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_item');
    }
}
