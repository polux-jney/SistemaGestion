
-- Creación de la tabla departamentos
CREATE TABLE IF NOT EXISTS departamentos (
  idDepartamento INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(100) NOT NULL,
  activo TINYINT(1) NOT NULL DEFAULT 1,
  fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  idEmpActualiza INT NULL DEFAULT 1,
  PRIMARY KEY (idDepartamento))
ENGINE = InnoDB

-- Creación de la tabla categorias
CREATE TABLE IF NOT EXISTS categorias (
  idCategoria INT NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(100) NOT NULL,
  activo TINYINT(1) NOT NULL DEFAULT 1,
  fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  idEmpActualiza INT NULL DEFAULT 1,
  PRIMARY KEY (idcategoria))
ENGINE = InnoDB


--- Creación de la tabla de Empleados
CREATE TABLE IF NOT EXISTS empleados (
  idEmpleado INT NOT NULL AUTO_INCREMENT,
  nombre TEXT NOT NULL,
  primerApellido TEXT NOT NULL,
  segundoApellido TEXT NULL,
  email VARCHAR(100) NOT NULL,
  fechaEntrada DATETIME NOT NULL,
  fechaBaja DATETIME NULL,
  idDepartamento INT NOT NULL,
  idJefe INT NULL,
  esJefe TINYINT NULL DEFAULT 0,
  usr VARCHAR(100) NOT NULL,
  pwd VARCHAR(256) NOT NULL,
  foto VARCHAR(100) NULL,
  activo TINYINT(1) NOT NULL DEFAULT '1',
  fechaCreacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  fechaActualizacion DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  idEmpActualiza INT(11) NULL DEFAULT '1',
  PRIMARY KEY (idEmpleado),
  UNIQUE INDEX idEmpleado_UNIQUE (idEmpleado ASC) ,
  INDEX fk_empleados_departamenteos_idx (idDepartamento ASC) ,
  CONSTRAINT fk_empleados_departamentos_01
    FOREIGN KEY (idDepartamento)
    REFERENCES departamentos (idDepartamento)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB

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
  INDEX `fk_gastos_categorias1_idx` (`idCategoria` ASC),
  CONSTRAINT `fk_gastos_categorias1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `dbgtoadmin2`.`categorias` (`idCategoria`)
    ON DELETE RESTRICT
    ON UPDATE NO CASCADE)
ENGINE = InnoDB


