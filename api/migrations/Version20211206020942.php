<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206020942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consent DROP CONSTRAINT fk_631208108ba5b20e');
        $this->addSql('DROP INDEX idx_631208108ba5b20e');
        $this->addSql('ALTER TABLE consent RENAME COLUMN consent_contract_id TO contract_id');
        $this->addSql('ALTER TABLE consent RENAME COLUMN uuid TO user_uuid');
        $this->addSql('ALTER TABLE consent ADD CONSTRAINT FK_631208102576E0FD FOREIGN KEY (contract_id) REFERENCES contract (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_631208102576E0FD ON consent (contract_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE consent DROP CONSTRAINT FK_631208102576E0FD');
        $this->addSql('DROP INDEX IDX_631208102576E0FD');
        $this->addSql('ALTER TABLE consent RENAME COLUMN contract_id TO consent_contract_id');
        $this->addSql('ALTER TABLE consent RENAME COLUMN user_uuid TO uuid');
        $this->addSql('ALTER TABLE consent ADD CONSTRAINT fk_631208108ba5b20e FOREIGN KEY (consent_contract_id) REFERENCES contract (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_631208108ba5b20e ON consent (consent_contract_id)');
    }
}
