<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410133413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_adress (user_id INT NOT NULL, adress_id INT NOT NULL, PRIMARY KEY(user_id, adress_id))');
        $this->addSql('CREATE INDEX IDX_39BEDC83A76ED395 ON user_adress (user_id)');
        $this->addSql('CREATE INDEX IDX_39BEDC838486F9AC ON user_adress (adress_id)');
        $this->addSql('ALTER TABLE user_adress ADD CONSTRAINT FK_39BEDC83A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_adress ADD CONSTRAINT FK_39BEDC838486F9AC FOREIGN KEY (adress_id) REFERENCES adress (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_adress DROP CONSTRAINT FK_39BEDC83A76ED395');
        $this->addSql('ALTER TABLE user_adress DROP CONSTRAINT FK_39BEDC838486F9AC');
        $this->addSql('DROP TABLE user_adress');
    }
}
