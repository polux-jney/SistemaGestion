<?php
//incluir la configuración de la conexion
require "../config/conexion.php";

Class Categoria{
  public function __construct(){

  }

  public function insertar($descripcion){
    $sql= "INSERT INTO categorias (descripcion) values ('$descripcion')";
    return ejecutarConsultaRetornaID($sql);
  }

  public function editar($idCategoria, $descripcion, $fechaActualizacion, $idEmpActualiza){
    $sql="UPDATE categorias SET descripcion='$descripcion', fechaActualizacion='$fechaActualizacion', idEmpActualiza='$idEmpActualiza'
      WHERE idCategoria='$idCategoria' ";
      return ejecutarConsulta($sql);
  }

  public function desactivar($idCategoria){
    $sql= "UPDATE categorias SET activo = '0'
    WHERE idCategoria='$idCategoria' " ;
    return ejecutarConsulta($sql);
  }

  public function activar($idCategoria){
    $sql= "UPDATE categorias SET activo = '1'
    WHERE idCategoria='$idCategoria' " ;
    return ejecutarConsulta($sql);
  }	

  public function mostrar($idCategoria){
    $sql= "SELECT idCategoria, descripcion, activo, fechaCreacion, fechaActualizacion, idEmpActualiza FROM categorias 
    WHERE  idCategoria='$idCategoria' " ;

    return ejecutarConsultaSimpleFila($sql);
  }

  public function listar(){
    $sql= "SELECT c.idCategoria,
     c.descripcion, c.activo, c.fechaCreacion, c.fechaActualizacion, 
     c.idEmpActualiza, e3.nombre as nombreAct, e3.primerApellido as primerApellidoAct 
     FROM categorias c LEFT OUTER JOIN empleados e3 ON c.idEmpActualiza = e3.idEmpleado" ;
    return ejecutarConsulta($sql);
  }

  public function select(){
    $sql= "SELECT idCategoria, descripcion, activo, fechaCreacion, 
    fechaActualizacion, idEmpActualiza FROM categorias
    WHERE activo='1'" ;
    return ejecutarConsulta($sql);
  }
}

?>