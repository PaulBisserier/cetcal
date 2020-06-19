-- MySQL Script generated by MySQL Workbench
-- Fri 19 Jun 2020 10:22:58 AM CEST
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
CREATE SCHEMA IF NOT EXISTS cetcal DEFAULT CHARACTER SET utf8 ;
USE cetcal ;

-- -----------------------------------------------------
-- Table cetcal.qstprod_producteur
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS cetcal.qstprod_producteur (
  qstprod_idpkai_producteur INT NOT NULL AUTO_INCREMENT,
  nom VARCHAR(30) NULL,
  prenom VARCHAR(30) NULL,
  email VARCHAR(60) NULL,
  email_bu VARCHAR(60) NULL,
  mdpsha VARCHAR(512) NOT NULL,
  telfixe VARCHAR(14) NULL,
  telport VARCHAR(14) NULL,
  nom_ferme VARCHAR(60) NOT NULL,
  siret VARCHAR(14) NULL,
  adrferme_numvoie VARCHAR(12) NULL,
  adrferme_rue VARCHAR(128) NULL,
  adrferme_lieudit VARCHAR(60) NULL,
  adrferme_commune VARCHAR(45) NOT NULL,
  adrferme_cp VARCHAR(12) NOT NULL,
  adrferme_compladr VARCHAR(60) NULL,
  pageurl_fb VARCHAR(60) NULL,
  pageurl_ig VARCHAR(60) NULL,
  pageurl_twitter VARCHAR(60) NULL,
  url_web VARCHAR(128) NULL,
  url_boutique VARCHAR(128) NULL,
  orgcertifbio VARCHAR(30) NULL,
  typesproduction VARCHAR(256) NULL,
  surfacehectterres DECIMAL(10,0) NULL,
  surfacesousserre DECIMAL(10,0) NULL,
  tetes_betail DECIMAL(10,0) NULL,
  hl_par_an DECIMAL(10,0) NULL,
  groupe_cagette VARCHAR(60) NULL,
  specificites_productions VARCHAR(256) NULL,
  modes_commandes VARCHAR(256) NULL,
  modes_paiments VARCHAR(128) NULL,
  modes_receptions VARCHAR(128) NULL,
  identifiant_cet VARCHAR(20) NOT NULL,
  PRIMARY KEY (qstprod_idpkai_producteur))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Données générales du producteur et de sa ferme/exploitation. Adresses ferme.\nDonnées civiles producteur et exploitation agricole. \nDonnées réseaux sociaux. Siret ferme/exploitation.';


-- -----------------------------------------------------
-- Table cetcal.cet_sondage
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS cetcal.cet_sondage (
  cet_sondage_idpkai INT NOT NULL AUTO_INCREMENT,
  fk_sondage_qstprod_idpkai_producteur INT NOT NULL,
  question VARCHAR(60) NOT NULL,
  reponse VARCHAR(60) NOT NULL,
  PRIMARY KEY (cet_sondage_idpkai),
  INDEX fk_cet_sondage_qstprod_producteur_idx (fk_sondage_qstprod_idpkai_producteur ASC),
  CONSTRAINT fk_qstprod_idpkai_producteur
    FOREIGN KEY (fk_sondage_qstprod_idpkai_producteur)
    REFERENCES cetcal.qstprod_producteur (qstprod_idpkai_producteur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Question + reponse à un sondage. Qui répond.';


-- -----------------------------------------------------
-- Table cetcal.cetcal_produits
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS cetcal.cetcal_produits (
  cetcal_produits_idpkai INT NOT NULL AUTO_INCREMENT,
  fk_produits_qstprod_idpkai_producteur INT NOT NULL,
  nom VARCHAR(45) NOT NULL,
  quantite_uni DECIMAL(10,0) NULL,
  quantite_mesure DECIMAL(10,0) NULL,
  categorie VARCHAR(45) NULL,
  description VARCHAR(45) NULL,
  PRIMARY KEY (cetcal_produits_idpkai),
  INDEX fk_qstprod_idpkai_producteur_idx (fk_produits_qstprod_idpkai_producteur ASC),
  CONSTRAINT fk_produits_qstprod_idpkai_producteur
    FOREIGN KEY (fk_produits_qstprod_idpkai_producteur)
    REFERENCES cetcal.qstprod_producteur (qstprod_idpkai_producteur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table cetcal.cetcal_lieu
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS cetcal.cetcal_lieu (
  cetcal_lieux_idpkai INT NOT NULL AUTO_INCREMENT,
  fk_lieu_qstprod_idpkai_producteur INT NOT NULL,
  nom VARCHAR(45) NULL,
  adresse_literale VARCHAR(256) NULL,
  jours_prodducteur VARCHAR(60) NULL,
  jour_collecte_conso VARCHAR(60) NULL,
  PRIMARY KEY (cetcal_lieux_idpkai),
  INDEX fk_qstprod_idpkai_producteur_idx (fk_lieu_qstprod_idpkai_producteur ASC),
  CONSTRAINT fk_lieu_qstprod_idpkai_producteur
    FOREIGN KEY (fk_lieu_qstprod_idpkai_producteur)
    REFERENCES cetcal.qstprod_producteur (qstprod_idpkai_producteur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'entites de vente distribution';


-- -----------------------------------------------------
-- Table cetcal.cetcal_information_producteur
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS cetcal.cetcal_information_producteur (
  cetcal_question_producteur_idpkai INT NOT NULL AUTO_INCREMENT,
  fk_infop_qstprod_idpkai_producteur INT NOT NULL,
  clef_information VARCHAR(60) NOT NULL,
  valeure_information VARCHAR(128) NOT NULL,
  PRIMARY KEY (cetcal_question_producteur_idpkai),
  INDEX fk_qstprod_idpkai_producteur_idx (fk_infop_qstprod_idpkai_producteur ASC),
  CONSTRAINT fk_infop_qstprod_idpkai_producteur
    FOREIGN KEY (fk_infop_qstprod_idpkai_producteur)
    REFERENCES cetcal.qstprod_producteur (qstprod_idpkai_producteur)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
