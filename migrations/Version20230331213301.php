<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230331213301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients_apv (id INT AUTO_INCREMENT NOT NULL, compte_affaire VARCHAR(255) NOT NULL, compte_evenement VARCHAR(255) DEFAULT NULL, compte_derniere_evenement VARCHAR(255) DEFAULT NULL, numero_fiche VARCHAR(15) DEFAULT NULL, libelle_civilite VARCHAR(5) DEFAULT NULL, proprietaire_actuel_vehicule VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, num_et_nom_voie VARCHAR(255) DEFAULT NULL, complement_adresse1 VARCHAR(255) DEFAULT NULL, code_postal VARCHAR(7) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, telephone_domicile VARCHAR(50) DEFAULT NULL, telephone_portable VARCHAR(50) DEFAULT NULL, telephone_job VARCHAR(50) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, date_mise_en_circulation DATE DEFAULT NULL, date_achat DATE DEFAULT NULL, date_derniere_evenement DATE DEFAULT NULL, libelle_marque VARCHAR(50) DEFAULT NULL, libelle_modele VARCHAR(50) DEFAULT NULL, version VARCHAR(255) DEFAULT NULL, vin VARCHAR(255) DEFAULT NULL, immatriculation VARCHAR(50) DEFAULT NULL, type_prospect VARCHAR(50) DEFAULT NULL, kilométrage INT DEFAULT NULL, libelle_energie VARCHAR(50) DEFAULT NULL, vendeur_vn VARCHAR(255) DEFAULT NULL, vendeur_vo VARCHAR(255) DEFAULT NULL, commentaire_facturation LONGTEXT DEFAULT NULL, type_vnvo VARCHAR(2) DEFAULT NULL, num_dossier_vnvo VARCHAR(50) DEFAULT NULL, intermediaire_vente_vn VARCHAR(255) DEFAULT NULL, date_evenement DATE DEFAULT NULL, origine_evenement VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE clients_apv');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
