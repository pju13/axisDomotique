<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200218161411 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE connected_object_scenario (connected_object_id INT NOT NULL, scenario_id INT NOT NULL, INDEX IDX_A2F25FFEEB4B1C (connected_object_id), INDEX IDX_A2F25FFE04E49DF (scenario_id), PRIMARY KEY(connected_object_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE connected_object_scenario ADD CONSTRAINT FK_A2F25FFEEB4B1C FOREIGN KEY (connected_object_id) REFERENCES connected_object (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE connected_object_scenario ADD CONSTRAINT FK_A2F25FFE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE connected_object_scenario');
    }
}
