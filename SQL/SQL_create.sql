-- MySQL Script generated by MySQL Workbench
-- Mon May 28 10:06:39 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Nounous`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Nounous` (
  `idNounous` INT NOT NULL AUTO_INCREMENT,
  `Prénom` VARCHAR(45) NULL,
  `Portable` INT(10) NULL,
  `Age` INT(2) NULL,
  `Présentation` VARCHAR(200) NULL,
  `Expérience` VARCHAR(100) NULL,
  `Visible` TINYINT NULL,
  PRIMARY KEY (`idNounous`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parents` (
  `idParents` INT NOT NULL AUTO_INCREMENT,
  `Ville` VARCHAR(45) NOT NULL,
  `Informations Générales` VARCHAR(200) NULL,
  PRIMARY KEY (`idParents`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Horaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Horaires` (
  `idHoraires` INT NOT NULL AUTO_INCREMENT,
  `Date` DATE NOT NULL,
  `Heure Début` TIME NOT NULL,
  `Heure Fin` TIME NOT NULL,
  PRIMARY KEY (`idHoraires`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Enfants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Enfants` (
  `idEnfants` INT NOT NULL AUTO_INCREMENT,
  `Prénom` VARCHAR(45) NOT NULL,
  `Date de Naissance` DATE NOT NULL,
  `Restrictions Alimentaires` VARCHAR(200) NULL,
  `Parents_idParents` INT NOT NULL,
  PRIMARY KEY (`idEnfants`),
  INDEX `fk_Enfants_Parents1_idx` (`Parents_idParents` ASC),
  CONSTRAINT `fk_Enfants_Parents1`
    FOREIGN KEY (`Parents_idParents`)
    REFERENCES `mydb`.`Parents` (`idParents`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Langues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Langues` (
  `idLangue` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Recherche Garde_Parents_idParents` INT NOT NULL,
  `Recherche Garde_Disponibilités_idHoraire` INT NOT NULL,
  PRIMARY KEY (`idLangue`, `Recherche Garde_Parents_idParents`, `Recherche Garde_Disponibilités_idHoraire`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(45) NOT NULL,
  `MDP` VARCHAR(255) NOT NULL,
  `Nounous_idNounous` INT NULL,
  `Parents_idParents` INT NULL,
  PRIMARY KEY (`idUtilisateur`),
  INDEX `fk_Utilisateur_Nounous_idx` (`Nounous_idNounous` ASC),
  INDEX `fk_Utilisateur_Parents1_idx` (`Parents_idParents` ASC),
  CONSTRAINT `fk_Utilisateur_Nounous`
    FOREIGN KEY (`Nounous_idNounous`)
    REFERENCES `mydb`.`Nounous` (`idNounous`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Utilisateur_Parents1`
    FOREIGN KEY (`Parents_idParents`)
    REFERENCES `mydb`.`Parents` (`idParents`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Parle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Parle` (
  `Langues_idLangue` INT NOT NULL,
  `Nounous_idNounous` INT NOT NULL,
  `Niveau` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Langues_idLangue`, `Nounous_idNounous`),
  INDEX `fk_Langues_has_Nounous_Nounous1_idx` (`Nounous_idNounous` ASC),
  INDEX `fk_Langues_has_Nounous_Langues1_idx` (`Langues_idLangue` ASC),
  CONSTRAINT `fk_Langues_has_Nounous_Langues1`
    FOREIGN KEY (`Langues_idLangue`)
    REFERENCES `mydb`.`Langues` (`idLangue`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Langues_has_Nounous_Nounous1`
    FOREIGN KEY (`Nounous_idNounous`)
    REFERENCES `mydb`.`Nounous` (`idNounous`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Garde`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Garde` (
  `Nounous_idNounous` INT NOT NULL,
  `Horaires_idHoraires` INT NOT NULL,
  `Régulier` TINYINT NOT NULL,
  `Date Début` DATE NULL,
  `Date Fin` DATE NULL,
  `Langue` TINYINT NULL,
  `nbr_enfant` INT NULL,
  `Prix` INT NULL,
  `Note` INT NULL,
  `Appreciation` VARCHAR(300) NULL,
  PRIMARY KEY (`Nounous_idNounous`, `Horaires_idHoraires`),
  INDEX `fk_Nounous_has_Disponibilités_Disponibilités1_idx` (`Horaires_idHoraires` ASC),
  INDEX `fk_Nounous_has_Disponibilités_Nounous1_idx` (`Nounous_idNounous` ASC),
  CONSTRAINT `fk_Nounous_has_Disponibilités_Nounous1`
    FOREIGN KEY (`Nounous_idNounous`)
    REFERENCES `mydb`.`Nounous` (`idNounous`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Nounous_has_Disponibilités_Disponibilités1`
    FOREIGN KEY (`Horaires_idHoraires`)
    REFERENCES `mydb`.`Horaires` (`idHoraires`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Enfants_Gardé`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Enfants_Gardé` (
  `Enfants_idEnfants` INT NOT NULL,
  `Garde_Nounous_idNounous` INT NOT NULL,
  `Garde_Horaires_idHoraires` INT NOT NULL,
  PRIMARY KEY (`Enfants_idEnfants`, `Garde_Nounous_idNounous`, `Garde_Horaires_idHoraires`),
  INDEX `fk_Enfants_has_Propose_Propose1_idx` (`Garde_Nounous_idNounous` ASC, `Garde_Horaires_idHoraires` ASC),
  INDEX `fk_Enfants_has_Propose_Enfants1_idx` (`Enfants_idEnfants` ASC),
  CONSTRAINT `fk_Enfants_has_Propose_Enfants1`
    FOREIGN KEY (`Enfants_idEnfants`)
    REFERENCES `mydb`.`Enfants` (`idEnfants`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Enfants_has_Propose_Propose1`
    FOREIGN KEY (`Garde_Nounous_idNounous` , `Garde_Horaires_idHoraires`)
    REFERENCES `mydb`.`Garde` (`Nounous_idNounous` , `Horaires_idHoraires`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Thomas
 * Created: 6 juin 2018
 */

