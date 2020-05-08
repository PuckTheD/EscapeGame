<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200507130611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE indice CHANGE indices_id indices_id INT DEFAULT NULL, CHANGE hint hint VARCHAR(255) DEFAULT NULL, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) DEFAULT NULL, CHANGE scenario_team_id scenario_team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE themathique themathique VARCHAR(255) DEFAULT NULL, CHANGE nb_jour nb_jour INT DEFAULT NULL, CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE team DROP user_id, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE themathique CHANGE scenario_id_id scenario_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique CHANGE themes_id themes_id INT DEFAULT NULL, CHANGE scenario scenario VARCHAR(255) DEFAULT NULL, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP role, CHANGE roles roles JSON NOT NULL, CHANGE nickname nickname VARCHAR(255) NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE indice CHANGE indices_id indices_id INT DEFAULT NULL, CHANGE hint hint VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE scenario_team_id scenario_team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE themathique themathique VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nb_jour nb_jour INT DEFAULT NULL, CHANGE duree duree TIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE team ADD user_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE themathique CHANGE scenario_id_id scenario_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique CHANGE themes_id themes_id INT DEFAULT NULL, CHANGE scenario scenario VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD role LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_bin`, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE nickname nickname VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
