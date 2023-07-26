<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230726072927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Brand CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Listing ADD model_id INT NOT NULL, ADD produced_year INT NOT NULL, ADD mileage INT NOT NULL, ADD price INT NOT NULL, ADD created_at DATETIME NOT NULL, ADD image VARCHAR(255) DEFAULT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE Listing ADD CONSTRAINT FK_CB0048D47975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('CREATE INDEX IDX_CB0048D47975B7E7 ON Listing (model_id)');
        $this->addSql('ALTER TABLE Model ADD brand_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE Model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_D79572D944F5D008 ON Model (brand_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE brand CHANGE name name VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE listing DROP FOREIGN KEY FK_CB0048D47975B7E7');
        $this->addSql('DROP INDEX IDX_CB0048D47975B7E7 ON listing');
        $this->addSql('ALTER TABLE listing DROP model_id, DROP produced_year, DROP mileage, DROP price, DROP created_at, DROP image, CHANGE title title VARCHAR(60) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('DROP INDEX IDX_D79572D944F5D008 ON model');
        $this->addSql('ALTER TABLE model DROP brand_id, CHANGE name name INT NOT NULL');
    }
}
