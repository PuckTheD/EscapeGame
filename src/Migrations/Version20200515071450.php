<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200515071450 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE progression (id INT AUTO_INCREMENT NOT NULL, progress VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_team (id INT AUTO_INCREMENT NOT NULL, scenarios_id INT DEFAULT NULL, scenario_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_A42D7023F1FD3C29 (scenarios_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventaire (id INT AUTO_INCREMENT NOT NULL, indice_id INT DEFAULT NULL, team_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game (id INT AUTO_INCREMENT NOT NULL, teams_id INT DEFAULT NULL, INDEX IDX_EC9858EAD6365F12 (teams_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_scenario (current_game_id INT NOT NULL, scenario_id INT NOT NULL, INDEX IDX_84FF8D1C4E825C80 (current_game_id), INDEX IDX_84FF8D1CE04E49DF (scenario_id), PRIMARY KEY(current_game_id, scenario_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_inventaire (current_game_id INT NOT NULL, inventaire_id INT NOT NULL, INDEX IDX_9AA93D0F4E825C80 (current_game_id), INDEX IDX_9AA93D0FCE430A85 (inventaire_id), PRIMARY KEY(current_game_id, inventaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE current_game_progression (current_game_id INT NOT NULL, progression_id INT NOT NULL, INDEX IDX_E5AE8F874E825C80 (current_game_id), INDEX IDX_E5AE8F87AF229C18 (progression_id), PRIMARY KEY(current_game_id, progression_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE indice (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, indice_txt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nickname VARCHAR(255) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_team (user_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_BE61EAD6A76ED395 (user_id), INDEX IDX_BE61EAD6296CD8AE (team_id), PRIMARY KEY(user_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, nb_jour INT NOT NULL, duree TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_thematique (scenario_id INT NOT NULL, thematique_id INT NOT NULL, INDEX IDX_8373657CE04E49DF (scenario_id), INDEX IDX_8373657C476556AF (thematique_id), PRIMARY KEY(scenario_id, thematique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_indice (scenario_id INT NOT NULL, indice_id INT NOT NULL, INDEX IDX_24326586E04E49DF (scenario_id), INDEX IDX_24326586C8C0B132 (indice_id), PRIMARY KEY(scenario_id, indice_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematique (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(100) NOT NULL, theme VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scenario_team ADD CONSTRAINT FK_A42D7023F1FD3C29 FOREIGN KEY (scenarios_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE current_game ADD CONSTRAINT FK_EC9858EAD6365F12 FOREIGN KEY (teams_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1C4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_scenario ADD CONSTRAINT FK_84FF8D1CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0F4E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_inventaire ADD CONSTRAINT FK_9AA93D0FCE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F874E825C80 FOREIGN KEY (current_game_id) REFERENCES current_game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE current_game_progression ADD CONSTRAINT FK_E5AE8F87AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657CE04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_thematique ADD CONSTRAINT FK_8373657C476556AF FOREIGN KEY (thematique_id) REFERENCES thematique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_indice ADD CONSTRAINT FK_24326586C8C0B132 FOREIGN KEY (indice_id) REFERENCES indice (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE current_game_progression DROP FOREIGN KEY FK_E5AE8F87AF229C18');
        $this->addSql('ALTER TABLE current_game_inventaire DROP FOREIGN KEY FK_9AA93D0FCE430A85');
        $this->addSql('ALTER TABLE current_game_scenario DROP FOREIGN KEY FK_84FF8D1C4E825C80');
        $this->addSql('ALTER TABLE current_game_inventaire DROP FOREIGN KEY FK_9AA93D0F4E825C80');
        $this->addSql('ALTER TABLE current_game_progression DROP FOREIGN KEY FK_E5AE8F874E825C80');
        $this->addSql('ALTER TABLE scenario_indice DROP FOREIGN KEY FK_24326586C8C0B132');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6A76ED395');
        $this->addSql('ALTER TABLE current_game DROP FOREIGN KEY FK_EC9858EAD6365F12');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6296CD8AE');
        $this->addSql('ALTER TABLE scenario_team DROP FOREIGN KEY FK_A42D7023F1FD3C29');
        $this->addSql('ALTER TABLE current_game_scenario DROP FOREIGN KEY FK_84FF8D1CE04E49DF');
        $this->addSql('ALTER TABLE scenario_thematique DROP FOREIGN KEY FK_8373657CE04E49DF');
        $this->addSql('ALTER TABLE scenario_indice DROP FOREIGN KEY FK_24326586E04E49DF');
        $this->addSql('ALTER TABLE scenario_thematique DROP FOREIGN KEY FK_8373657C476556AF');
        $this->addSql('DROP TABLE progression');
        $this->addSql('DROP TABLE scenario_team');
        $this->addSql('DROP TABLE inventaire');
        $this->addSql('DROP TABLE current_game');
        $this->addSql('DROP TABLE current_game_scenario');
        $this->addSql('DROP TABLE current_game_inventaire');
        $this->addSql('DROP TABLE current_game_progression');
        $this->addSql('DROP TABLE indice');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_team');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE scenario_thematique');
        $this->addSql('DROP TABLE scenario_indice');
        $this->addSql('DROP TABLE thematique');
    }
}
