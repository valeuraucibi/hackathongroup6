<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616144205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photos_esgi');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photos_esgi (id INT UNSIGNED AUTO_INCREMENT NOT NULL, id_compte INT NOT NULL, photo_url VARCHAR(48) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, dh_publication DATETIME NOT NULL, dh_prise DATETIME NOT NULL, lieu VARCHAR(100) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, ville VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, departement VARCHAR(3) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, pays VARCHAR(50) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, altitude CHAR(12) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_geonames INT NOT NULL, titre VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, message_aux_moderateurs VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, exif VARCHAR(255) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, statut VARCHAR(255) CHARACTER SET latin1 DEFAULT \'0\' NOT NULL COLLATE `latin1_swedish_ci`, accord_media VARCHAR(255) CHARACTER SET latin1 DEFAULT \'0\' NOT NULL COLLATE `latin1_swedish_ci`, libre_droits VARCHAR(255) CHARACTER SET latin1 DEFAULT \'0\' NOT NULL COLLATE `latin1_swedish_ci`, accord_evaluations VARCHAR(255) CHARACTER SET latin1 DEFAULT \'0\' NOT NULL COLLATE `latin1_swedish_ci`, dh_envoi DATETIME NOT NULL, id_moderateur INT NOT NULL, id_mail_refus INT DEFAULT NULL, avis_moderateurs_demande VARCHAR(255) CHARACTER SET latin1 DEFAULT \'0\' NOT NULL COLLATE `latin1_swedish_ci`, tag VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, tags TINYTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, precision_lieu VARCHAR(255) CHARACTER SET latin1 DEFAULT \'\' NOT NULL COLLATE `latin1_swedish_ci`, est_argentic TINYINT(1) DEFAULT \'0\' NOT NULL, est_mobile TINYINT(1) DEFAULT \'0\' NOT NULL, likes_cache TEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, FULLTEXT INDEX lieu (lieu, titre, description, exif), INDEX statut (statut), INDEX departement (departement), INDEX id_compte (id_compte), INDEX est_argentic (est_argentic), INDEX pays (pays), INDEX dh_publication (dh_publication), INDEX est_mobile (est_mobile), INDEX id_geonames (id_geonames), INDEX dh_prise (dh_prise), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE historic_events DROP FOREIGN KEY FK_F0719860A76ED395');
        $this->addSql('ALTER TABLE historic_normales DROP FOREIGN KEY FK_8D94E363A76ED395');
    }
}
