<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511132956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE scenario_thematique (scenario_id INT NOT NULL, thematique_id INT NOT NULL, INDEX IDX_8373657CE04E49DF (scenario_id), INDEX IDX_8373657C476556AF (thematique_id), PRIMARY KEY(scenario_id, thematique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_indice (scenario_id INT NOT NULL, indice_id INT NOT NULL, INDEX IDX_24326586E04E49DF (scenario_id), INDEX IDX_24326586C8C0B132 (indice_id), PRIMARY KEY(scenario_id, indice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657C476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586C8C0B132 FOREIGN KEY (indice_id) REFERENCES indice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_team ADD scenarios_id INT DEFAULT NULL, ADD scenario_id INT NOT NULL, ADD team_id INT NOT NULL');
        $this->addSql('ALTER TABLE scenario_team ADD CONSTRAINT FK_A42D7023F1FD3C29 FOREIGN KEY (scenarios_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_A42D7023F1FD3C29 ON scenario_team (scenarios_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE scenario_thematique');
        $this->addSql('DROP TABLE scenario_indice');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE scenario CHANGE duree duree TIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE scenario_team DROP FOREIGN KEY FK_A42D7023F1FD3C29');
        $this->addSql('DROP INDEX IDX_A42D7023F1FD3C29 ON scenario_team');
        $this->addSql('ALTER TABLE scenario_team DROP scenarios_id, DROP scenario_id, DROP team_id');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
