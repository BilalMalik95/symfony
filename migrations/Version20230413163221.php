<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413163221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql('alter TABLE fruits add column calories varchar(255)');
        $this->addSql('alter TABLE fruits add column fat varchar(255)');
        $this->addSql('alter TABLE fruits add column sugar varchar(255)');
        $this->addSql('alter TABLE fruits add column carbohydrates varchar(255)');
        $this->addSql('alter TABLE fruits add column protein varchar(255)');


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('alter TABLE fruits drop calories');
        $this->addSql('alter TABLE fruits drop fat ');
        $this->addSql('alter TABLE fruits drop  sugar ');
        $this->addSql('alter TABLE fruits drop  carbohydrates ');
        $this->addSql('alter TABLE fruits drop  protein ');
    }
}
