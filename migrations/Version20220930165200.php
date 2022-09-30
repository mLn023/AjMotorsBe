<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220930165200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DCEC89005');
        $this->addSql('ALTER TABLE car_equipment DROP FOREIGN KEY FK_D4DA27AF517FE9FE');
        $this->addSql('ALTER TABLE car_equipment DROP FOREIGN KEY FK_D4DA27AFC3C6F69F');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583C3C6F69F');
        $this->addSql('DROP TABLE car_equipment');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE features');
        $this->addSql('DROP INDEX UNIQ_773DE69DCEC89005 ON car');
        $this->addSql('ALTER TABLE car ADD energy VARCHAR(255) DEFAULT NULL, ADD gearbox VARCHAR(255) DEFAULT NULL, ADD color_outside VARCHAR(255) DEFAULT NULL, ADD color_inside VARCHAR(255) DEFAULT NULL, ADD num_of_doors SMALLINT DEFAULT NULL, ADD num_of_seats SMALLINT DEFAULT NULL, ADD is_first_hand TINYINT(1) DEFAULT NULL, ADD fiscal_power SMALLINT DEFAULT NULL, ADD horse_power SMALLINT DEFAULT NULL, ADD co2_emission DOUBLE PRECISION DEFAULT NULL, ADD consumption DOUBLE PRECISION DEFAULT NULL, ADD first_registration DATE DEFAULT NULL, ADD technical_control DATE DEFAULT NULL, CHANGE features_id mileage INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car_equipment (car_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_D4DA27AF517FE9FE (equipment_id), INDEX IDX_D4DA27AFC3C6F69F (car_id), PRIMARY KEY(car_id, equipment_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_D338D583C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE features (id INT AUTO_INCREMENT NOT NULL, year SMALLINT DEFAULT NULL, realeasedate DATE DEFAULT NULL, technicalcontrol DATE DEFAULT NULL, mileage INT DEFAULT NULL, gearbox VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, outsidecolor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, insidecolor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, doornumber SMALLINT DEFAULT NULL, seatnumber SMALLINT DEFAULT NULL, isitfirsthand TINYINT(1) DEFAULT NULL, fiscalpower SMALLINT DEFAULT NULL, horsepower SMALLINT DEFAULT NULL, co2_emmision SMALLINT DEFAULT NULL, consumption NUMERIC(2, 1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE car_equipment ADD CONSTRAINT FK_D4DA27AF517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_equipment ADD CONSTRAINT FK_D4DA27AFC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE car DROP energy, DROP gearbox, DROP color_outside, DROP color_inside, DROP num_of_doors, DROP num_of_seats, DROP is_first_hand, DROP fiscal_power, DROP horse_power, DROP co2_emission, DROP consumption, DROP first_registration, DROP technical_control, CHANGE mileage features_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DCEC89005 FOREIGN KEY (features_id) REFERENCES features (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_773DE69DCEC89005 ON car (features_id)');
    }
}
