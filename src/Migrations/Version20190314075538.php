<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190314075538 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `admin` ADD COLUMN `fk_company` INT(11) NULL DEFAULT NULL AFTER `id`, ADD COLUMN `fk_restaurant` INT(11) NULL DEFAULT NULL AFTER `fk_company`');

        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76BF903463 FOREIGN KEY (fk_company) REFERENCES company (id)');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D761BFBD8AC FOREIGN KEY (fk_restaurant) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_880E0D76BF903463 ON admin (fk_company)');
        $this->addSql('CREATE INDEX IDX_880E0D761BFBD8AC ON admin (fk_restaurant)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76BF903463');
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D761BFBD8AC');
        $this->addSql('DROP INDEX IDX_880E0D76BF903463 ON admin');
        $this->addSql('DROP INDEX IDX_880E0D761BFBD8AC ON admin');
        $this->addSql('ALTER TABLE `admin` DROP COLUMN `fk_restaurant`, DROP COLUMN `fk_company`;');
    }
}
