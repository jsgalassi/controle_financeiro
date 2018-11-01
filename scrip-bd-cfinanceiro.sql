-- MySQL Script generated by MySQL Workbench
-- Thu Oct 25 21:58:00 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cfinanceiro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cfinanceiro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cfinanceiro` DEFAULT CHARACTER SET utf8 ;
USE `cfinanceiro` ;

-- -----------------------------------------------------
-- Table `cfinanceiro`.`CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`CLIENTE` (
  `CODCLIENTE` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(200) NULL,
  `CPF` VARCHAR(45) NULL,
  PRIMARY KEY (`CODCLIENTE`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`BANCOS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`BANCOS` (
  `CODBANCO` INT NOT NULL,
  `NROBANCO` VARCHAR(5) NULL,
  `RAZAOSOCIAL` VARCHAR(150) NULL,
  `NOMEFANTASIA` VARCHAR(150) NULL,
  `CLIENTE_CODCLIENTE` INT NOT NULL,
  PRIMARY KEY (`CODBANCO`),
  INDEX `fk_BANCOS_CLIENTE1_idx` (`CLIENTE_CODCLIENTE` ASC),
  CONSTRAINT `fk_BANCOS_CLIENTE1`
    FOREIGN KEY (`CLIENTE_CODCLIENTE`)
    REFERENCES `cfinanceiro`.`CLIENTE` (`CODCLIENTE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`GRUPOCONTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`GRUPOCONTA` (
  `CODGRUPO` INT NOT NULL AUTO_INCREMENT,
  `NOMEGRUPO` VARCHAR(150) NULL,
  PRIMARY KEY (`CODGRUPO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`TPCONTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`TPCONTA` (
  `CONTAID` INT NOT NULL AUTO_INCREMENT,
  `NOMECONTA` VARCHAR(150) NULL,
  `GRUPOCONTA_CODGRUPO` INT NOT NULL,
  PRIMARY KEY (`CONTAID`),
  INDEX `fk_TPCONTA_GRUPOCONTA_idx` (`GRUPOCONTA_CODGRUPO` ASC),
  CONSTRAINT `fk_TPCONTA_GRUPOCONTA`
    FOREIGN KEY (`GRUPOCONTA_CODGRUPO`)
    REFERENCES `cfinanceiro`.`GRUPOCONTA` (`CODGRUPO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`OPERACAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`OPERACAO` (
  `CODOP` INT NOT NULL AUTO_INCREMENT,
  `DESCRICAOOP` VARCHAR(45) NULL,
  PRIMARY KEY (`CODOP`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`MOVIMENTACAO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`MOVIMENTACAO` (
  `CODMOV` INT NOT NULL AUTO_INCREMENT,
  `DESCRICAO` VARCHAR(45) NULL,
  `VALOR` DOUBLE NULL,
  `TPCONTA_CONTAID` INT NOT NULL,
  `OPERACAO_CODOP` INT NOT NULL,
  PRIMARY KEY (`CODMOV`),
  INDEX `fk_MOVIMENTACAO_TPCONTA1_idx` (`TPCONTA_CONTAID` ASC),
  INDEX `fk_MOVIMENTACAO_OPERACAO1_idx` (`OPERACAO_CODOP` ASC),
  CONSTRAINT `fk_MOVIMENTACAO_TPCONTA1`
    FOREIGN KEY (`TPCONTA_CONTAID`)
    REFERENCES `cfinanceiro`.`TPCONTA` (`CONTAID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_MOVIMENTACAO_OPERACAO1`
    FOREIGN KEY (`OPERACAO_CODOP`)
    REFERENCES `cfinanceiro`.`OPERACAO` (`CODOP`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`CONTABANCO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`CONTABANCO` (
  `CODCONTA` INT NOT NULL AUTO_INCREMENT,
  `NROAGENCIA` VARCHAR(10) NULL,
  `NATCONTA` VARCHAR(20) NULL,
  `NROCONTA` VARCHAR(45) NULL,
  `TIPOPERACAO` VARCHAR(45) NULL,
  `MOVIMENTACAO_CODMOV` INT NOT NULL,
  `BANCOS_CODBANCO` INT NOT NULL,
  PRIMARY KEY (`CODCONTA`),
  INDEX `fk_CONTABANCO_MOVIMENTACAO1_idx` (`MOVIMENTACAO_CODMOV` ASC),
  INDEX `fk_CONTABANCO_BANCOS1_idx` (`BANCOS_CODBANCO` ASC),
  CONSTRAINT `fk_CONTABANCO_MOVIMENTACAO1`
    FOREIGN KEY (`MOVIMENTACAO_CODMOV`)
    REFERENCES `cfinanceiro`.`MOVIMENTACAO` (`CODMOV`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CONTABANCO_BANCOS1`
    FOREIGN KEY (`BANCOS_CODBANCO`)
    REFERENCES `cfinanceiro`.`BANCOS` (`CODBANCO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`USUARIO` (
  `CODUSUARIO` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`CODUSUARIO`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cfinanceiro`.`MODULO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cfinanceiro`.`MODULO` (
  `CODMOD` INT NOT NULL AUTO_INCREMENT,
  `DESCMODULO` VARCHAR(20) NULL,
  `URLMODULO` VARCHAR(500) NULL,
  `USUARIO_CODUSUARIO` INT NOT NULL,
  PRIMARY KEY (`CODMOD`),
  INDEX `fk_MODULO_USUARIO1_idx` (`USUARIO_CODUSUARIO` ASC),
  CONSTRAINT `fk_MODULO_USUARIO1`
    FOREIGN KEY (`USUARIO_CODUSUARIO`)
    REFERENCES `cfinanceiro`.`USUARIO` (`CODUSUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;