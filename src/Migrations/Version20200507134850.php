<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200507134850 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE team_user');
        $this->addSql('ALTER TABLE indice CHANGE indices_id indices_id INT DEFAULT NULL, CHANGE hint hint VARCHAR(255) DEFAULT NULL, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression ADD scenario_team_id INT DEFAULT NULL, CHANGE progress progress VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario CHANGE themathique themathique VARCHAR(255) DEFAULT NULL, CHANGE nb_jour nb_jour INT DEFAULT NULL, CHANGE duree duree TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_team DROP FOREIGN KEY FK_A42D7023296CD8AE');
        $this->addSql('ALTER TABLE scenario_team DROP FOREIGN KEY FK_A42D7023E04E49DF');
        $this->addSql('DROP INDEX IDX_A42D7023E04E49DF ON scenario_team');
        $this->addSql('DROP INDEX IDX_A42D7023296CD8AE ON scenario_team');
        $this->addSql('ALTER TABLE scenario_team ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F636AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_progression ADD CONSTRAINT FK_1969E2F6AF229C18 FOREIGN KEY (progression_id) REFERENCES progression (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C305436AA18AE FOREIGN KEY (scenario_team_id) REFERENCES scenario_team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team_inventaire ADD CONSTRAINT FK_E44C3054CE430A85 FOREIGN KEY (inventaire_id) REFERENCES inventaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE themathique CHANGE scenario_id_id scenario_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique CHANGE themes_id themes_id INT DEFAULT NULL, CHANGE scenario scenario VARCHAR(255) DEFAULT NULL, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique ADD CONSTRAINT FK_3A8ED5A894F4A9D2 FOREIGN KEY (themes_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, DROP role, CHANGE email email VARCHAR(180) NOT NULL, CHANGE nickname nickname VARCHAR(255) NOT NULL, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_team ADD CONSTRAINT FK_BE61EAD6296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE team_user (team_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_5C722232A76ED395 (user_id), INDEX IDX_5C722232296CD8AE (team_id), PRIMARY KEY(team_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_user ADD CONSTRAINT FK_5C722232A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE indice CHANGE indices_id indices_id INT DEFAULT NULL, CHANGE hint hint VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE inventaire CHANGE indice_id indice_id INT DEFAULT NULL, CHANGE user_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE progression DROP scenario_team_id, CHANGE progress progress VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE scenario CHANGE themathique themathique VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nb_jour nb_jour INT DEFAULT NULL, CHANGE duree duree TIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE scenario_team MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE scenario_team DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE scenario_team DROP id');
        $this->addSql('ALTER TABLE scenario_team ADD CONSTRAINT FK_A42D7023296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scenario_team ADD CONSTRAINT FK_A42D7023E04E49DF FOREIGN KEY (scenario_id) REFERENCES scenario (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_A42D7023E04E49DF ON scenario_team (scenario_id)');
        $this->addSql('CREATE INDEX IDX_A42D7023296CD8AE ON scenario_team (team_id)');
        $this->addSql('ALTER TABLE scenario_team ADD PRIMARY KEY (scenario_id, team_id)');
        $this->addSql('ALTER TABLE scenario_team_inventaire DROP FOREIGN KEY FK_E44C305436AA18AE');
        $this->addSql('ALTER TABLE scenario_team_inventaire DROP FOREIGN KEY FK_E44C3054CE430A85');
        $this->addSql('ALTER TABLE scenario_team_progression DROP FOREIGN KEY FK_1969E2F636AA18AE');
        $this->addSql('ALTER TABLE scenario_team_progression DROP FOREIGN KEY FK_1969E2F6AF229C18');
        $this->addSql('ALTER TABLE themathique CHANGE scenario_id_id scenario_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thematique DROP FOREIGN KEY FK_3A8ED5A894F4A9D2');
        $this->addSql('ALTER TABLE thematique CHANGE themes_id themes_id INT DEFAULT NULL, CHANGE scenario scenario VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE scenario_id scenario_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD role VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, DROP roles, CHANGE email email VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nickname nickname VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE avatar avatar VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE token token VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6A76ED395');
        $this->addSql('ALTER TABLE user_team DROP FOREIGN KEY FK_BE61EAD6296CD8AE');
    }
}
