<?php
//incluir la configuración de la conexion
require "../config/conexion.php";

Class Gasto{
  public function __construct(){
 
  }
 
  public function insertar($fechaGasto, $descripcionGasto, $idCategoria, $gasto, $idEmpActualiza){
    $sql= "INSERT INTO gastos (fechaGasto, descripcionGasto, idCategoria, gasto, idEmpActualiza) values ('$fechaGasto','$descripcionGasto', '$idCategoria','$gasto','$idEmpActualiza')";
    return ejecutarConsultaRetornaID($sql);
  }

  public function editar($idGasto, $fechaGasto, $descripcionGasto,$idCategoria, $gasto, $fechaActualizacion, $idEmpActualiza){
    $sql="UPDATE gastos SET fechaGasto='$fechaGasto', descripcionGasto='$descripcionGasto', idCategoria='$idCategoria', gasto='$gasto', fechaActualizacion='$fechaActualizacion', idEmpActualiza='$idEmpActualiza'
      WHERE idGasto='$idGasto' ";
      return ejecutarConsulta($sql);
  }

  public function desactivar($idGasto){
    $sql= "UPDATE gastos SET activo = '0'
    WHERE idGasto='$idGasto' " ;
    return ejecutarConsulta($sql);
  }

  public function activar($idGasto){
    $sql= "UPDATE gastos SET activo = '1'
    WHERE idGasto='$idGasto' " ;
    return ejecutarConsulta($sql);
  }	

  public function mostrar($idGasto){
    $sql= "SELECT idGasto, fechaGasto, descripcionGasto,
     idCategoria, gasto, activo, fechaCreacion, 
    fechaActualizacion, idEmpActualiza FROM gastos 
    WHERE  idGasto='$idGasto' " ;

    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar(){
    $sql= "SELECT c.idGasto, c.fechaGasto, c.descripcionGasto, c.idCategoria, c.gasto, c.activo,
     c.fechaCreacion, c.fechaActualizacion, c.idEmpActualiza, d.descripcion as nomCatego,
      e3.nombre as nombreAct, e3.primerApellido as primerApellidoAct
      FROM gastos c INNER JOIN categorias d
		ON c.idCategoria = d.idCategoria LEFT OUTER JOIN empleados e3 ON c.idEmpActualiza = e3.idEmpleado" ;
    return ejecutarConsulta($sql);
  }

  public function select(){
    $sql= "SELECT idGasto, fechaGasto, descripcionGasto, idCategoria, gasto, 
    activo, fechaCreacion, fechaActualizacion, idEmpActualiza FROM gastos
    WHERE activo='1'" ;
    return ejecutarConsulta($sql);
  }
}

?>