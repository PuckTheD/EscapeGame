<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200506132004 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE indice (id INT AUTO_INCREMENT NOT NULL, indices_id INT DEFAULT NULL, hint VARCHAR(255) DEFAULT NULL, scenario_id INT DEFAULT NULL, INDEX IDX_38710B552F6E2C14 (indices_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inventaire (id INT AUTO_INCREMENT NOT NULL, indice_id INT DEFAULT NULL, user_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE progression (id INT AUTO_INCREMENT NOT NULL, progress VARCHAR(255) DEFAULT NULL, scenario_team_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, themathique VARCHAR(255) DEFAULT NULL, nb_jour INT DEFAULT NULL, duree TIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_team (id INT AUTO_INCREMENT NOT NULL, scenario_id INT NOT NULL, team_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_team_progression (scenario_team_id INT NOT NULL, progression_id INT NOT NULL, INDEX IDX_1969E2F636AA18AE (scenario_team_id), INDEX IDX_1969E2F6AF229C18 (progression_id), PRIMARY KEY(scenario_team_id, progression_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_team_inventaire (scenario_team_id INT NOT NULL, inventaire_id INT NOT NULL, INDEX IDX_E44C305436AA18AE (scenario_team_id), INDEX IDX_E44C3054CE430A85 (inventaire_id), PRIMARY KEY(scenario_team_id, inventaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, user_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE themathique (id INT AUTO_INCREMENT NOT NULL, scenario_id_id INT DEFAULT NULL, scenario VARCHAR(255) NOT NULL, INDEX IDX_D2EB3318504B2F06 (scenario_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thematique (id INT AUTO_INCREMENT NOT NULL, themes_id INT DEFAULT NULL, scenario VARCHAR(255) DEFAULT NULL, scenario_id INT DEFAULT NULL, INDEX IDX_3A8ED5A894F4A9D2 (themes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, role JSON DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_team (user_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_BE61EAD6A76ED395 (user_id), INDEX IDX_BE61EAD6296CD8AE (team_id), PRIMARY KEY(user_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE indice ADD CONSTRAINT FK_38710B552F6E2C14 FOREIGN KEY (indices_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F636AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F6AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C305436AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C3054CE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE themathique ADD CONSTRAINT FK_D2EB3318504B2F06 FOREIGN KEY (scenario_id_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE thematique ADD CONSTRAINT FK_3A8ED5A894F4A9D2 FOREIGN KEY (themes_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE scenario_team_inventaire DROP FOREIGN KEY FK_E44C3054CE430A85');
        $this->addSql('ALTER TABLE scenario_team_progression DROP FOREIGN KEY FK_1969E2F6AF229C18');
        $this->addSql('ALTER TABLE indice DROP FOREIGN KEY FK_38710B552F6E2C14');
        $this->addSql('ALTER TABLE themathique DROP FOREIGN KEY FK_D2EB3318504B2F06');
        $this->addSql('ALTER TABLE thematique DROP FOREIGN KEY FK_3A8ED5A894F4A9D2');
        $this->addSql('ALTER TABLE scenario_team_progression DROP FOREIGN KEY FK_1969E2F636AA18AE');
        $this->addSql('ALTER TABLE scenario_team_inventaire DROP FOREIGN KEY FK_E44C305436AA18AE');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6296CD8AE');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6A76ED395');
        $this->addSql('DROP TABLE indice');
        $this->addSql('DROP TABLE inventaire');
        $this->addSql('DROP TABLE progression');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE scenario_team');
        $this->addSql('DROP TABLE scenario_team_progression');
        $this->addSql('DROP TABLE scenario_team_inventaire');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE themathique');
        $this->addSql('DROP TABLE thematique');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_team');
    }
}
