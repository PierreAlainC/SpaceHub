<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260305150406 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE planet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(120) NOT NULL, english_name VARCHAR(120) DEFAULT NULL, is_planet TINYINT(1) NOT NULL, mass DOUBLE PRECISION DEFAULT NULL, diameter DOUBLE PRECISION DEFAULT NULL, gravity DOUBLE PRECISION DEFAULT NULL, density DOUBLE PRECISION DEFAULT NULL, mean_temperature INT DEFAULT NULL, semimajor_axis DOUBLE PRECISION DEFAULT NULL, orbital_period DOUBLE PRECISION DEFAULT NULL, orbital_speed DOUBLE PRECISION DEFAULT NULL, moons_count INT DEFAULT NULL, discovered_by VARCHAR(255) DEFAULT NULL, discovered_date VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE planet');
    }
}
