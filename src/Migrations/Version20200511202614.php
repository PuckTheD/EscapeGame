<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200511202614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE current_game (id INT AUTO_INCREMENT NOT NULL, teams_id INT DEFAULT NULL, INDEX IDX_EC9858EAD6365F12 (teams_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_scenario (current_game_id INT NOT NULL, scenario_id INT NOT NULL, INDEX IDX_84FF8D1C4E825C80 (current_game_id), INDEX IDX_84FF8D1CE04E49DF (scenario_id), PRIMARY KEY(current_game_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_inventaire (current_game_id INT NOT NULL, inventaire_id INT NOT NULL, INDEX IDX_9AA93D0F4E825C80 (current_game_id), INDEX IDX_9AA93D0FCE430A85 (inventaire_id), PRIMARY KEY(current_game_id, inventaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_progression (current_game_id INT NOT NULL, progression_id INT NOT NULL, INDEX IDX_E5AE8F874E825C80 (current_game_id), INDEX IDX_E5AE8F87AF229C18 (progression_id), PRIMARY KEY(current_game_id, progression_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE current_game ADD CONSTRAINT FK_EC9858EAD6365F12 FOREIGN KEY (teams_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1C4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0F4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0FCE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F874E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F87AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE current_game_scenario DROP FOREIGN KEY FK_84FF8D1C4E825C80');
        $this->addSql('ALTER TABLE current_game_inventaire DROP FOREIGN KEY FK_9AA93D0F4E825C80');
        $this->addSql('ALTER TABLE current_game_progression DROP FOREIGN KEY FK_E5AE8F874E825C80');
        $this->addSql('DROP TABLE current_game');
        $this->addSql('DROP TABLE current_game_scenario');
        $this->addSql('DROP TABLE current_game_inventaire');
        $this->addSql('DROP TABLE current_game_progression');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE team_id team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression CHANGE progress progress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE scenario CHANGE duree duree TIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
