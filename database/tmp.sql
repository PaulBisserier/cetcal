-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_produits`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_produits` (
  `cetcal_produits_idpkai` INT NOT NULL AUTO_INCREMENT,
  `fk_produits_qstprod_idpkai_producteur` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `quantite_uni` DECIMAL(10,0) NULL,
  `quantite_mesure` DECIMAL(10,0) NULL,
  `categorie` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`cetcal_produits_idpkai`),
  INDEX `fk_produits_qstprod_idpkai_producteur` (`fk_produits_qstprod_idpkai_producteur` ASC),
  CONSTRAINT `fk_produits_qstprod_idpkai_producteur`
    FOREIGN KEY (`fk_produits_qstprod_idpkai_producteur`)
    REFERENCES `cetcal`.`qstprod_producteur` (`qstprod_idpkai_producteur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

