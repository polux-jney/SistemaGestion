-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbgtoadmin2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbgtoadmin2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbgtoadmin2` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `dbgtoadmin2` ;

-- -----------------------------------------------------
-- Table `dbgtoadmin2`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbgtoadmin2`.`categorias` (
  `idCategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT 1,
  `fechaCreacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `fechaActualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `idEmpActualiza` INT(11) NULL DEFAULT 1,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `dbgtoadmin2`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbgtoadmin2`.`departamentos` (
  `idDepartamento` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT 1,
  `fechaCreacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `fechaActualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `idEmpActualiza` INT(11) NULL DEFAULT 1,
  PRIMARY KEY (`idDepartamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `dbgtoadmin2`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbgtoadmin2`.`empleados` (
  `idEmpleado` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` TEXT NOT NULL,
  `primerApellido` TEXT NOT NULL,
  `segundoApellido` TEXT NULL DEFAULT NULL,
  `email` VARCHAR(100) NOT NULL,
  `fechaEntrada` DATETIME NOT NULL,
  `fechaBaja` DATETIME NULL DEFAULT NULL,
  `idDepartamento` INT(11) NOT NULL,
  `idJefe` INT(11) NULL DEFAULT NULL,
  `esJefe` TINYINT(4) NULL DEFAULT 0,
  `usr` VARCHAR(100) NOT NULL,
  `pwd` VARCHAR(256) NOT NULL,
  `foto` VARCHAR(100) NULL DEFAULT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT 1,
  `fechaCreacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `fechaActualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `idEmpActualiza` INT(11) NULL DEFAULT 1,
  PRIMARY KEY (`idEmpleado`),
  UNIQUE INDEX `idEmpleado_UNIQUE` (`idEmpleado` ASC) VISIBLE,
  INDEX `fk_empleados_departamenteos_idx` (`idDepartamento` ASC) VISIBLE,
  CONSTRAINT `fk_empleados_departamentos_01`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `dbgtoadmin2`.`departamentos` (`idDepartamento`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


-- -----------------------------------------------------
-- Table `dbgtoadmin2`.`gastos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbgtoadmin2`.`gastos` (
  `idGasto` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaGasto` DATETIME NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `idCategoria` INT(11) NULL,
  `gasto` FLOAT(11) NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT 1,
  `fechaCreacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `fechaActualizacion` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `idEmpActualiza` INT(11) NULL DEFAULT 1,
  PRIMARY KEY (`idGasto`),
  INDEX `fk_gastos_categorias1_idx` (`idCategoria` ASC) VISIBLE,
  CONSTRAINT `fk_gastos_categorias1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `dbgtoadmin2`.`categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
