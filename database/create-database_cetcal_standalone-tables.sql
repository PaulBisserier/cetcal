-- -----------------------------------------------------
-- Table `cetcal`.`cetcal_cartographie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cetcal`.`cetcal_cartographie` (
  `pk_cartographie` INT NOT NULL AUTO_INCREMENT,
  `cetcal_prd_lat` VARCHAR(16) NOT NULL,
  `cetcal_prd_lng` VARCHAR(16) NOT NULL,
  `fk_producteur` INT NOT NULL,
  PRIMARY KEY (`pk_cartographie`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;