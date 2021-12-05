<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205063935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE consent_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE consent (id INT NOT NULL, consent_contract_id INT DEFAULT NULL, uuid UUID NOT NULL, consent BOOLEAN NOT NULL, valid_for INT NOT NULL, time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_by UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_631208108BA5B20E ON consent (consent_contract_id)');
        $this->addSql('CREATE INDEX IDX_631208106F949845 ON consent (time)');
        $this->addSql('CREATE TABLE contract (id INT NOT NULL, created_by UUID NOT NULL, company_name VARCHAR(255) NOT NULL, address TEXT DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, contract_start TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, contract_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, consent_required_on VARCHAR(255) NOT NULL, max_consent_days INT NOT NULL, mandatory BOOLEAN NOT NULL, contact_email VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, ftp BOOLEAN DEFAULT NULL, ftp_dir BOOLEAN DEFAULT NULL, programmatic_name VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE consent ADD CONSTRAINT FK_631208108BA5B20E FOREIGN KEY (consent_contract_id) REFERENCES contract (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE consent DROP CONSTRAINT FK_631208108BA5B20E');
        $this->addSql('DROP SEQUENCE consent_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP TABLE consent');
        $this->addSql('DROP TABLE contract');
    }
}
