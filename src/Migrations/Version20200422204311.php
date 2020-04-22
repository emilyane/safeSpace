<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422204311 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE accomodation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, street_address VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, phone VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME NOT NULL, language_spoken VARCHAR(255) NOT NULL, INDEX IDX_520D81B3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accomodation ADD CONSTRAINT FK_520D81B3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD street_address VARCHAR(255) DEFAULT NULL, ADD commune VARCHAR(255) DEFAULT NULL, ADD phone_number VARCHAR(255) DEFAULT NULL, ADD organisation_affiliation VARCHAR(255) DEFAULT NULL, ADD is_admin TINYINT(1) DEFAULT NULL, ADD photo VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE accomodation');
        $this->addSql('ALTER TABLE user DROP name, DROP last_name, DROP street_address, DROP commune, DROP phone_number, DROP organisation_affiliation, DROP is_admin, DROP photo');
    }
}
