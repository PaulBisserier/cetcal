-- MySQL Script generated by MySQL Workbench
-- Sat 20 Jun 2020 08:43:18 PM CEST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cetcal
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cetcal
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cetcal` DEFAULT CHARACTER SET utf8 ;
USE `cetcal` ;

-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_producteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_producteur` (
  `pk_producteur` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(30) NULL,
  `prenom` VARCHAR(30) NULL,
  `email` VARCHAR(60) NULL,
  `email_bu` VARCHAR(60) NULL,
  `mdpsha` VARCHAR(512) NOT NULL,
  `telfixe` VARCHAR(14) NULL,
  `telport` VARCHAR(14) NULL,
  `nom_ferme` VARCHAR(60) NOT NULL,
  `siret` VARCHAR(14) NULL,
  `adrferme_numvoie` VARCHAR(12) NULL,
  `adrferme_rue` VARCHAR(128) NULL,
  `adrferme_lieudit` VARCHAR(60) NULL,
  `adrferme_commune` VARCHAR(45) NOT NULL,
  `adrferme_cp` VARCHAR(12) NOT NULL,
  `adrferme_compladr` VARCHAR(60) NULL,
  `pageurl_fb` VARCHAR(60) NULL,
  `pageurl_ig` VARCHAR(60) NULL,
  `pageurl_twitter` VARCHAR(60) NULL,
  `url_web` VARCHAR(128) NULL,
  `url_boutique` VARCHAR(128) NULL,
  `orgcertifbio` VARCHAR(30) NULL,
  `surfacehectterres` DECIMAL(10,0) NULL,
  `surfacesousserre` DECIMAL(10,0) NULL,
  `tetes_betail` DECIMAL(10,0) NULL,
  `hl_par_an` DECIMAL(10,0) NULL,
  `groupe_cagette` VARCHAR(60) NULL,
  `identifiant_cet` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`pk_producteur`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Données générales du producteur et de sa ferme/exploitation. Adresses ferme.\nDonnées civiles producteur et exploitation agricole. \nDonnées réseaux sociaux. Siret ferme/exploitation.';


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_sondage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_sondage` (
  `pk_sondage` INT NOT NULL AUTO_INCREMENT,
  `fk_producteur_sondage` INT NOT NULL,
  `clef_question` VARCHAR(4) NOT NULL,
  `val_question` VARCHAR(45) NULL,
  `reponse` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`pk_sondage`),
  INDEX `fk_cet_sondage_qstprod_producteur_idx` (`fk_producteur_sondage` ASC),
  CONSTRAINT `fk_qstprod_idpkai_producteur`
    FOREIGN KEY (`fk_producteur_sondage`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Question + reponse à un sondage. Qui répond.';


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_produit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_produit` (
  `pk_produit` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `quantite_uni` DECIMAL(10,0) NULL,
  `quantite_mesure` DECIMAL(10,0) NULL,
  `categorie` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`pk_produit`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_lieu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_lieu` (
  `pk_lieu` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `adresse_literale` VARCHAR(256) NULL,
  `jours_producteur` VARCHAR(60) NULL,
  `jour_collecte_conso` VARCHAR(60) NULL,
  PRIMARY KEY (`pk_lieu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'entites de vente distribution';


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_information_producteur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_information_producteur` (
  `pk_question_producteur` INT NOT NULL AUTO_INCREMENT,
  `fk_producteur_information_producteur` INT NOT NULL,
  `clef_information` VARCHAR(4) NOT NULL,
  `val_information` VARCHAR(128) NULL,
  `information` VARCHAR(128) NOT NULL,
  PRIMARY KEY (`pk_question_producteur`),
  INDEX `fk_qstprod_idpkai_producteur_idx` (`fk_producteur_information_producteur` ASC),
  CONSTRAINT `fk_infop_qstprod_idpkai_producteur`
    FOREIGN KEY (`fk_producteur_information_producteur`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cetcal`.`producteur_join_produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`producteur_join_produits` (
  `fk_producteur_join` INT NOT NULL,
  `fk_produits_join` INT NOT NULL,
  PRIMARY KEY (`fk_producteur_join`, `fk_produits_join`),
  INDEX `fk_qstprod_producteur_has_cetcal_produits_cetcal_produits1_idx` (`fk_produits_join` ASC),
  INDEX `fk_qstprod_producteur_has_cetcal_produits_qstprod_producteu_idx` (`fk_producteur_join` ASC),
  CONSTRAINT `fk_qstprod_producteur_has_cetcal_produits_qstprod_producteur1`
    FOREIGN KEY (`fk_producteur_join`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_qstprod_producteur_has_cetcal_produits_cetcal_produits1`
    FOREIGN KEY (`fk_produits_join`)
    REFERENCES `cetcal`.`cetcal_produit` (`pk_produit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cetcal`.`producteur_join_lieu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`producteur_join_lieu` (
  `fk_producteur_join` INT NOT NULL,
  `fk_lieu` INT NOT NULL,
  PRIMARY KEY (`fk_producteur_join`, `fk_lieu`),
  INDEX `fk_qstprod_producteur_has_cetcal_lieu_cetcal_lieu1_idx` (`fk_lieu` ASC),
  INDEX `fk_qstprod_producteur_has_cetcal_lieu_qstprod_producteur1_idx` (`fk_producteur_join` ASC),
  CONSTRAINT `fk_qstprod_producteur_has_cetcal_lieu_qstprod_producteur1`
    FOREIGN KEY (`fk_producteur_join`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_qstprod_producteur_has_cetcal_lieu_cetcal_lieu1`
    FOREIGN KEY (`fk_lieu`)
    REFERENCES `cetcal`.`cetcal_lieu` (`pk_lieu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_type_production`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_type_production` (
  `pk_type_production` INT NOT NULL AUTO_INCREMENT,
  `clef_type_production` VARCHAR(4) NOT NULL,
  `val_type_production` VARCHAR(128) NOT NULL,
  `fk_producteur_type_production` INT NOT NULL,
  PRIMARY KEY (`pk_type_production`),
  INDEX `fk_producteur_idx` (`fk_producteur_type_production` ASC),
  CONSTRAINT `fk_producteur_type_production`
    FOREIGN KEY (`fk_producteur_type_production`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'types de productions. Valeurs du fichier de données /res/data/cet.qstprod.liste.activites';


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_specificite_produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_specificite_produits` (
  `pk_specificites_produits` INT NOT NULL AUTO_INCREMENT,
  `clef_specificite` VARCHAR(4) NOT NULL,
  `val_specificite` VARCHAR(128) NOT NULL,
  `fk_producteur_specificites_produits` INT NOT NULL,
  PRIMARY KEY (`pk_specificites_produits`),
  INDEX `fk_producteur_idx` (`fk_producteur_specificites_produits` ASC),
  CONSTRAINT `fk_producteur_specificites_produits`
    FOREIGN KEY (`fk_producteur_specificites_produits`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Spécificités des produits producteurs. Valeures possibes = contenu du fichier /res/data/';


-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_mode_conso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_mode_conso` (
  `pk_mode_conso` INT NOT NULL AUTO_INCREMENT,
  `clef_mode_conso` VARCHAR(4) NOT NULL,
  `val_mode_conso` VARCHAR(128) NOT NULL,
  `fk_producteur_mode_conso` INT NOT NULL,
  PRIMARY KEY (`pk_mode_conso`),
  INDEX `fk_cetcal_mode_commande_cetcal_producteur1_idx` (`fk_producteur_mode_conso` ASC),
  CONSTRAINT `fk_producteur_mode_conso`
    FOREIGN KEY (`fk_producteur_mode_conso`)
    REFERENCES `cetcal`.`cetcal_producteur` (`pk_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
