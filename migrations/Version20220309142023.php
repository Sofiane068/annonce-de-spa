<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309142023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chien_race (chien_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_5B5D7EE8BFCF400E (chien_id), INDEX IDX_5B5D7EE86E59D40D (race_id), PRIMARY KEY(chien_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chien_demande_adoption (chien_id INT NOT NULL, demande_adoption_id INT NOT NULL, INDEX IDX_22AA672FBFCF400E (chien_id), INDEX IDX_22AA672FC23B0AAB (demande_adoption_id), PRIMARY KEY(chien_id, demande_adoption_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chien_race ADD CONSTRAINT FK_5B5D7EE8BFCF400E FOREIGN KEY (chien_id) REFERENCES chien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chien_race ADD CONSTRAINT FK_5B5D7EE86E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chien_demande_adoption ADD CONSTRAINT FK_22AA672FBFCF400E FOREIGN KEY (chien_id) REFERENCES chien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE chien_demande_adoption ADD CONSTRAINT FK_22AA672FC23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES demande_adoption (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annonce ADD spa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E5DF3CB247 FOREIGN KEY (spa_id) REFERENCES spa (id)');
        $this->addSql('CREATE INDEX IDX_F65593E5DF3CB247 ON annonce (spa_id)');
        $this->addSql('ALTER TABLE chien ADD adoptant_id INT DEFAULT NULL, ADD annonce_id INT NOT NULL');
        $this->addSql('ALTER TABLE chien ADD CONSTRAINT FK_13A4067E8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('ALTER TABLE chien ADD CONSTRAINT FK_13A4067E8805AB2F FOREIGN KEY (annonce_id) REFERENCES annonce (id)');
        $this->addSql('CREATE INDEX IDX_13A4067E8D8B49F9 ON chien (adoptant_id)');
        $this->addSql('CREATE INDEX IDX_13A4067E8805AB2F ON chien (annonce_id)');
        $this->addSql('ALTER TABLE demande_adoption ADD adoptant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE demande_adoption ADD CONSTRAINT FK_AB87FF6B8D8B49F9 FOREIGN KEY (adoptant_id) REFERENCES adoptant (id)');
        $this->addSql('CREATE INDEX IDX_AB87FF6B8D8B49F9 ON demande_adoption (adoptant_id)');
        $this->addSql('ALTER TABLE image ADD chien_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FBFCF400E FOREIGN KEY (chien_id) REFERENCES chien (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FBFCF400E ON image (chien_id)');
        $this->addSql('ALTER TABLE message ADD demande_adoption_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FC23B0AAB FOREIGN KEY (demande_adoption_id) REFERENCES demande_adoption (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FC23B0AAB ON message (demande_adoption_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chien_race');
        $this->addSql('DROP TABLE chien_demande_adoption');
        $this->addSql('ALTER TABLE adoptant CHANGE telephone telephone VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E5DF3CB247');
        $this->addSql('DROP INDEX IDX_F65593E5DF3CB247 ON annonce');
        $this->addSql('ALTER TABLE annonce DROP spa_id, CHANGE titre titre VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE reponce reponce VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE chien DROP FOREIGN KEY FK_13A4067E8D8B49F9');
        $this->addSql('ALTER TABLE chien DROP FOREIGN KEY FK_13A4067E8805AB2F');
        $this->addSql('DROP INDEX IDX_13A4067E8D8B49F9 ON chien');
        $this->addSql('DROP INDEX IDX_13A4067E8805AB2F ON chien');
        $this->addSql('ALTER TABLE chien DROP adoptant_id, DROP annonce_id, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE antecedents antecedents VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE demande_adoption DROP FOREIGN KEY FK_AB87FF6B8D8B49F9');
        $this->addSql('DROP INDEX IDX_AB87FF6B8D8B49F9 ON demande_adoption');
        $this->addSql('ALTER TABLE demande_adoption DROP adoptant_id');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FBFCF400E');
        $this->addSql('DROP INDEX IDX_C53D045FBFCF400E ON image');
        $this->addSql('ALTER TABLE image DROP chien_id, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FC23B0AAB');
        $this->addSql('DROP INDEX IDX_B6BD307FC23B0AAB ON message');
        $this->addSql('ALTER TABLE message DROP demande_adoption_id, CHANGE texte texte VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE race CHANGE nom nom VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE spa CHANGE nom_association nom_association VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE mail mail VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mot_de_passe mot_de_passe VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE discr discr VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
