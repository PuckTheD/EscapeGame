<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200526205228 extends AbstractMigration
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
        $this->addSql('CREATE TABLE scenario_thematique (scenario_id INT NOT NULL, thematique_id INT NOT NULL, INDEX IDX_8373657CE04E49DF (scenario_id), INDEX IDX_8373657C476556AF (thematique_id), PRIMARY KEY(scenario_id, thematique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_indice (scenario_id INT NOT NULL, indice_id INT NOT NULL, INDEX IDX_24326586E04E49DF (scenario_id), INDEX IDX_24326586C8C0B132 (indice_id), PRIMARY KEY(scenario_id, indice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE current_game ADD CONSTRAINT FK_EC9858EAD6365F12 FOREIGN KEY (teams_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1C4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0F4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0FCE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F874E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F87AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657C476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586C8C0B132 FOREIGN KEY (indice_id) REFERENCES indice (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE scenario_team_inventaire');
        $this->addSql('DROP TABLE scenario_team_progression');
        $this->addSql('DROP TABLE themathique');
        $this->addSql('ALTER TABLE indice DROP FOREIGN KEY FK_38710B552F6E2C14');
        $this->addSql('DROP INDEX IDX_38710B552F6E2C14 ON indice');
        $this->addSql('ALTER TABLE indice ADD titre VARCHAR(100) NOT NULL, ADD indice_txt VARCHAR(255) NOT NULL, DROP indices_id, DROP hint, DROP scenario_id');
        $this->addSql('ALTER TABLE inventaire ADD team_id INT DEFAULT NULL, DROP user_id, CHANGE indice_id indice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression ADD created_at DATETIME DEFAULT NULL, DROP scenario_team_id, CHANGE progress progress VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario DROP themathique, CHANGE nb_jour nb_jour INT NOT NULL, CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_team ADD scenarios_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_team ADD CONSTRAINT FK_A42D7023F1FD3C29 FOREIGN KEY (scenarios_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_A42D7023F1FD3C29 ON scenario_team (scenarios_id)');
        $this->addSql('ALTER TABLE thematique DROP FOREIGN KEY FK_3A8ED5A894F4A9D2');
        $this->addSql('DROP INDEX IDX_3A8ED5A894F4A9D2 ON thematique');
        $this->addSql('ALTER TABLE thematique ADD titre VARCHAR(100) NOT NULL, ADD theme VARCHAR(255) NOT NULL, DROP themes_id, DROP scenario, DROP scenario_id');
        $this->addSql('ALTER TABLE user ADD reset_token VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE current_game_scenario DROP FOREIGN KEY FK_84FF8D1C4E825C80');
        $this->addSql('ALTER TABLE current_game_inventaire DROP FOREIGN KEY FK_9AA93D0F4E825C80');
        $this->addSql('ALTER TABLE current_game_progression DROP FOREIGN KEY FK_E5AE8F874E825C80');
        $this->addSql('CREATE TABLE scenario_team_inventaire (scenario_team_id INT NOT NULL, inventaire_id INT NOT NULL, INDEX IDX_E44C305436AA18AE (scenario_team_id), INDEX IDX_E44C3054CE430A85 (inventaire_id), PRIMARY KEY(scenario_team_id, inventaire_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE scenario_team_progression (scenario_team_id INT NOT NULL, progression_id INT NOT NULL, INDEX IDX_1969E2F636AA18AE (scenario_team_id), INDEX IDX_1969E2F6AF229C18 (progression_id), PRIMARY KEY(scenario_team_id, progression_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE themathique (id INT AUTO_INCREMENT NOT NULL, scenario_id_id INT DEFAULT NULL, scenario VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_D2EB3318504B2F06 (scenario_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C305436AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C3054CE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F636AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F6AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE themathique ADD CONSTRAINT FK_D2EB3318504B2F06 FOREIGN KEY (scenario_id_id) REFERENCES scenario (id)');
        $this->addSql('DROP TABLE current_game');
        $this->addSql('DROP TABLE current_game_scenario');
        $this->addSql('DROP TABLE current_game_inventaire');
        $this->addSql('DROP TABLE current_game_progression');
        $this->addSql('DROP TABLE scenario_thematique');
        $this->addSql('DROP TABLE scenario_indice');
        $this->addSql('ALTER TABLE indice ADD indices_id INT DEFAULT NULL, ADD hint VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, ADD scenario_id INT DEFAULT NULL, DROP titre, DROP indice_txt');
        $this->addSql('ALTER TABLE indice ADD CONSTRAINT FK_38710B552F6E2C14 FOREIGN KEY (indices_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_38710B552F6E2C14 ON indice (indices_id)');
        $this->addSql('ALTER TABLE inventaire ADD user_id INT DEFAULT NULL, DROP team_id, CHANGE indice_id indice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression ADD scenario_team_id INT DEFAULT NULL, DROP created_at, CHANGE progress progress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scenario ADD themathique VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE nb_jour nb_jour INT DEFAULT NULL, CHANGE duree duree TIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE scenario_team DROP FOREIGN KEY FK_A42D7023F1FD3C29');
        $this->addSql('DROP INDEX IDX_A42D7023F1FD3C29 ON scenario_team');
        $this->addSql('ALTER TABLE scenario_team DROP scenarios_id');
        $this->addSql('ALTER TABLE thematique ADD themes_id INT DEFAULT NULL, ADD scenario VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, ADD scenario_id INT DEFAULT NULL, DROP titre, DROP theme');
        $this->addSql('ALTER TABLE thematique ADD CONSTRAINT FK_3A8ED5A894F4A9D2 FOREIGN KEY (themes_id) REFERENCES scenario (id)');
        $this->addSql('CREATE INDEX IDX_3A8ED5A894F4A9D2 ON thematique (themes_id)');
        $this->addSql('ALTER TABLE user DROP reset_token, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
    }
}
