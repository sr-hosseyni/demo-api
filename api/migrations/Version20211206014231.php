<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211206014231 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE consent ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE consent ALTER uuid DROP DEFAULT');
        $this->addSql('ALTER TABLE consent ALTER created_by TYPE UUID');
        $this->addSql('ALTER TABLE consent ALTER created_by DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN consent.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN consent.created_by IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE contract ALTER created_by TYPE UUID');
        $this->addSql('ALTER TABLE contract ALTER created_by DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN contract.created_by IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE "user" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER uuid DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN "user".uuid IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE "user" ALTER uuid DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN "user".uuid IS NULL');
        $this->addSql('ALTER TABLE contract ALTER created_by TYPE UUID');
        $this->addSql('ALTER TABLE contract ALTER created_by DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN contract.created_by IS NULL');
        $this->addSql('ALTER TABLE consent ALTER uuid TYPE UUID');
        $this->addSql('ALTER TABLE consent ALTER uuid DROP DEFAULT');
        $this->addSql('ALTER TABLE consent ALTER created_by TYPE UUID');
        $this->addSql('ALTER TABLE consent ALTER created_by DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN consent.uuid IS NULL');
        $this->addSql('COMMENT ON COLUMN consent.created_by IS NULL');
    }
}
