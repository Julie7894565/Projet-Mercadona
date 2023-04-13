<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413104707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_product (order_id INT NOT NULL, product_id INT NOT NULL, PRIMARY KEY(order_id, product_id))');
        $this->addSql('CREATE INDEX IDX_2530ADE68D9F6D38 ON order_product (order_id)');
        $this->addSql('CREATE INDEX IDX_2530ADE64584665A ON order_product (product_id)');
        $this->addSql('CREATE TABLE user_adress (user_id INT NOT NULL, adress_id INT NOT NULL, PRIMARY KEY(user_id, adress_id))');
        $this->addSql('CREATE INDEX IDX_39BEDC83A76ED395 ON user_adress (user_id)');
        $this->addSql('CREATE INDEX IDX_39BEDC838486F9AC ON user_adress (adress_id)');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE68D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_adress ADD CONSTRAINT FK_39BEDC83A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_adress ADD CONSTRAINT FK_39BEDC838486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)');
        $this->addSql('ALTER TABLE product ADD product_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD product_promotion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADBE6903FD FOREIGN KEY (product_category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD9E39D3FF FOREIGN KEY (product_promotion_id) REFERENCES promotion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D34A04ADBE6903FD ON product (product_category_id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD9E39D3FF ON product (product_promotion_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE order_product DROP CONSTRAINT FK_2530ADE68D9F6D38');
        $this->addSql('ALTER TABLE order_product DROP CONSTRAINT FK_2530ADE64584665A');
        $this->addSql('ALTER TABLE user_adress DROP CONSTRAINT FK_39BEDC83A76ED395');
        $this->addSql('ALTER TABLE user_adress DROP CONSTRAINT FK_39BEDC838486F9AC');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE user_adress');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F5299398A76ED395');
        $this->addSql('DROP INDEX IDX_F5299398A76ED395');
        $this->addSql('ALTER TABLE "order" DROP user_id');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04ADBE6903FD');
        $this->addSql('ALTER TABLE product DROP CONSTRAINT FK_D34A04AD9E39D3FF');
        $this->addSql('DROP INDEX IDX_D34A04ADBE6903FD');
        $this->addSql('DROP INDEX IDX_D34A04AD9E39D3FF');
        $this->addSql('ALTER TABLE product DROP product_category_id');
        $this->addSql('ALTER TABLE product DROP product_promotion_id');
    }
}
