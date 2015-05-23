-- MySQL Script generated by MySQL Workbench
-- 05/23/15 03:36:45
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`role` ;

CREATE TABLE IF NOT EXISTS `mydb`.`role` (
  `idrole` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NULL,
  `unix_perms` BIGINT(20) NULL DEFAULT 4,
  PRIMARY KEY (`idrole`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`user` ;

CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(100) NULL,
  `creation_date` DATETIME NULL DEFAULT now(),
  `status` TINYINT(1) NULL DEFAULT 0,
  `roleid` INT NULL,
  `idrole` INT NOT NULL,
  PRIMARY KEY (`iduser`),
  INDEX `fk_user_role1_idx` (`idrole` ASC),
  CONSTRAINT `fk_user_role1`
    FOREIGN KEY (`idrole`)
    REFERENCES `mydb`.`role` (`idrole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`country`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`country` ;

CREATE TABLE IF NOT EXISTS `mydb`.`country` (
  `idcountry` INT NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idcountry`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`player`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`player` ;

CREATE TABLE IF NOT EXISTS `mydb`.`player` (
  `idplayer` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NULL,
  `born` DATE NULL,
  `height` DOUBLE NULL,
  `weight` DOUBLE NULL,
  `idcountry` INT NOT NULL,
  `photo` VARCHAR(300) NULL,
  `` VARCHAR(45) NULL,
  PRIMARY KEY (`idplayer`),
  INDEX `fk_player_country1_idx` (`idcountry` ASC),
  CONSTRAINT `fk_player_country1`
    FOREIGN KEY (`idcountry`)
    REFERENCES `mydb`.`country` (`idcountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`team` ;

CREATE TABLE IF NOT EXISTS `mydb`.`team` (
  `idteam` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL,
  `fundation_date` DATE NULL,
  `logo` VARCHAR(100) NULL,
  `teamcol` VARCHAR(45) NULL,
  PRIMARY KEY (`idteam`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`stadium`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`stadium` ;

CREATE TABLE IF NOT EXISTS `mydb`.`stadium` (
  `idstadium` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(300) NULL,
  `idcountry` INT NULL,
  `capacity` BIGINT(20) NULL,
  `photo` VARCHAR(45) NULL,
  PRIMARY KEY (`idstadium`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`position` ;

CREATE TABLE IF NOT EXISTS `mydb`.`position` (
  `idposition` INT NOT NULL AUTO_INCREMENT,
  `position` VARCHAR(100) NULL,
  PRIMARY KEY (`idposition`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`player_team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`player_team` ;

CREATE TABLE IF NOT EXISTS `mydb`.`player_team` (
  `idplayer` INT NOT NULL,
  `idteam` INT NOT NULL,
  `dorsal` INT NULL,
  `idposition` INT NOT NULL,
  `status` VARCHAR(1) NULL,
  PRIMARY KEY (`idplayer`, `idteam`),
  INDEX `fk_player_team_team1_idx` (`idteam` ASC),
  INDEX `fk_player_team_position1_idx` (`idposition` ASC),
  CONSTRAINT `fk_player_team_player1`
    FOREIGN KEY (`idplayer`)
    REFERENCES `mydb`.`player` (`idplayer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_player_team_team1`
    FOREIGN KEY (`idteam`)
    REFERENCES `mydb`.`team` (`idteam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_player_team_position1`
    FOREIGN KEY (`idposition`)
    REFERENCES `mydb`.`position` (`idposition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`team_stadium`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`team_stadium` ;

CREATE TABLE IF NOT EXISTS `mydb`.`team_stadium` (
  `idteam` INT NOT NULL,
  `idstadium` INT NOT NULL,
  `` VARCHAR(45) NULL,
  PRIMARY KEY (`idteam`, `idstadium`),
  INDEX `fk_team_stadium_stadium1_idx` (`idstadium` ASC),
  CONSTRAINT `fk_team_stadium_team1`
    FOREIGN KEY (`idteam`)
    REFERENCES `mydb`.`team` (`idteam`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_team_stadium_stadium1`
    FOREIGN KEY (`idstadium`)
    REFERENCES `mydb`.`stadium` (`idstadium`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`player_position`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`player_position` ;

CREATE TABLE IF NOT EXISTS `mydb`.`player_position` (
  `idplayer` INT NOT NULL,
  `idposition` INT NOT NULL,
  PRIMARY KEY (`idplayer`, `idposition`),
  INDEX `fk_player_position_position1_idx` (`idposition` ASC),
  CONSTRAINT `fk_player_position_player1`
    FOREIGN KEY (`idplayer`)
    REFERENCES `mydb`.`player` (`idplayer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_player_position_position1`
    FOREIGN KEY (`idposition`)
    REFERENCES `mydb`.`position` (`idposition`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`league`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`league` ;

CREATE TABLE IF NOT EXISTS `mydb`.`league` (
  `idleague` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(300) NULL,
  `idcountry` INT NULL,
  `photo` VARCHAR(100) NULL,
  PRIMARY KEY (`idleague`),
  INDEX `fk_league_country1_idx` (`idcountry` ASC),
  CONSTRAINT `fk_league_country1`
    FOREIGN KEY (`idcountry`)
    REFERENCES `mydb`.`country` (`idcountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tournament`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tournament` ;

CREATE TABLE IF NOT EXISTS `mydb`.`tournament` (
  `idtournament` INT NOT NULL AUTO_INCREMENT,
  `idleague` INT NULL,
  `teams` INT NULL,
  `phases` INT NULL,
  `start` DATE NULL,
  `end` DATE NULL,
  PRIMARY KEY (`idtournament`),
  INDEX `fk_tournament_league1_idx` (`idleague` ASC),
  CONSTRAINT `fk_tournament_league1`
    FOREIGN KEY (`idleague`)
    REFERENCES `mydb`.`league` (`idleague`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`coach`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`coach` ;

CREATE TABLE IF NOT EXISTS `mydb`.`coach` (
  `idcoach` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(300) NOT NULL,
  `idcountry` INT NOT NULL,
  `born` DATE NULL,
  `photo` VARCHAR(100) NULL,
  PRIMARY KEY (`idcoach`),
  INDEX `fk_coach_country1_idx` (`idcountry` ASC),
  CONSTRAINT `fk_coach_country1`
    FOREIGN KEY (`idcountry`)
    REFERENCES `mydb`.`country` (`idcountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`team_tournament`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`team_tournament` ;

CREATE TABLE IF NOT EXISTS `mydb`.`team_tournament` (
  `idteam_tournament` INT NOT NULL AUTO_INCREMENT,
  `idteam` INT NULL,
  `idtournament` INT NULL,
  PRIMARY KEY (`idteam_tournament`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`couch_team`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`couch_team` ;

CREATE TABLE IF NOT EXISTS `mydb`.`couch_team` (
  `idteam_tournament` INT NOT NULL,
  `idcoach` INT NOT NULL,
  `start` DATE NULL,
  `end` DATE NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`idteam_tournament`, `idcoach`),
  INDEX `fk_couch_team_coach1_idx` (`idcoach` ASC),
  CONSTRAINT `fk_couch_team_team_tournament1`
    FOREIGN KEY (`idteam_tournament`)
    REFERENCES `mydb`.`team_tournament` (`idteam_tournament`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_couch_team_coach1`
    FOREIGN KEY (`idcoach`)
    REFERENCES `mydb`.`coach` (`idcoach`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`referee`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`referee` ;

CREATE TABLE IF NOT EXISTS `mydb`.`referee` (
  `idreferee` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(300) NOT NULL,
  `height` DOUBLE NULL,
  `weight` DOUBLE NULL,
  `born` DATE NULL,
  `idcontry` INT NOT NULL,
  `photo` VARCHAR(100) NULL,
  PRIMARY KEY (`idreferee`),
  INDEX `fk_referee_country1_idx` (`idcontry` ASC),
  CONSTRAINT `fk_referee_country1`
    FOREIGN KEY (`idcontry`)
    REFERENCES `mydb`.`country` (`idcountry`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`match`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`match` ;

CREATE TABLE IF NOT EXISTS `mydb`.`match` (
  `idmatch` INT NOT NULL AUTO_INCREMENT,
  `local` INT NOT NULL,
  `visit` INT NOT NULL,
  `date` DATE NOT NULL,
  `idreferee` INT NOT NULL,
  `idstadium` INT NOT NULL,
  PRIMARY KEY (`idmatch`),
  INDEX `fk_match_team_tournament1_idx` (`local` ASC),
  INDEX `fk_match_team_tournament2_idx` (`visit` ASC),
  INDEX `fk_match_stadium1_idx` (`idstadium` ASC),
  INDEX `fk_match_referee1_idx` (`idreferee` ASC),
  CONSTRAINT `fk_match_team_tournament1`
    FOREIGN KEY (`local`)
    REFERENCES `mydb`.`team_tournament` (`idteam_tournament`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_team_tournament2`
    FOREIGN KEY (`visit`)
    REFERENCES `mydb`.`team_tournament` (`idteam_tournament`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_stadium1`
    FOREIGN KEY (`idstadium`)
    REFERENCES `mydb`.`stadium` (`idstadium`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_referee1`
    FOREIGN KEY (`idreferee`)
    REFERENCES `mydb`.`referee` (`idreferee`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`event`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`event` ;

CREATE TABLE IF NOT EXISTS `mydb`.`event` (
  `idevent` INT NOT NULL AUTO_INCREMENT,
  `event` VARCHAR(100) NULL,
  PRIMARY KEY (`idevent`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`match_events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`match_events` ;

CREATE TABLE IF NOT EXISTS `mydb`.`match_events` (
  `idmatch_events` INT NOT NULL AUTO_INCREMENT,
  `idevent` INT NOT NULL,
  `minute` INT NOT NULL,
  `first_actor` INT NOT NULL,
  `second_actor` INT NULL,
  `idmatch` INT NOT NULL,
  `first_actor_team` INT NULL,
  PRIMARY KEY (`idmatch_events`),
  INDEX `fk_match_events_event1_idx` (`idevent` ASC),
  INDEX `fk_match_events_team_tournament1_idx` (`first_actor_team` ASC),
  CONSTRAINT `fk_match_events_event1`
    FOREIGN KEY (`idevent`)
    REFERENCES `mydb`.`event` (`idevent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_match_events_team_tournament1`
    FOREIGN KEY (`first_actor_team`)
    REFERENCES `mydb`.`team_tournament` (`idteam_tournament`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`phase`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`phase` ;

CREATE TABLE IF NOT EXISTS `mydb`.`phase` (
  `idphase` INT NOT NULL AUTO_INCREMENT,
  `phase` VARCHAR(100) NULL,
  PRIMARY KEY (`idphase`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`qualifications`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`qualifications` ;

CREATE TABLE IF NOT EXISTS `mydb`.`qualifications` (
  `idqualifications` INT NOT NULL AUTO_INCREMENT,
  `idtournament` INT NOT NULL,
  `phase` INT NOT NULL,
  `idmatch` INT NOT NULL,
  PRIMARY KEY (`idqualifications`),
  INDEX `fk_qualifications_match1_idx` (`idmatch` ASC),
  INDEX `fk_qualifications_phase1_idx` (`phase` ASC),
  CONSTRAINT `fk_qualifications_match1`
    FOREIGN KEY (`idmatch`)
    REFERENCES `mydb`.`match` (`idmatch`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_qualifications_phase1`
    FOREIGN KEY (`phase`)
    REFERENCES `mydb`.`phase` (`idphase`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
