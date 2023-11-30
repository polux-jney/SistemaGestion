<?php   
require_once "../modelos/gasto.php";
session_start();

$gastoA = new Gasto();
 


//Obtenemos nuestras variables y limpiarlos del arreglo post
$idGasto=isset($_POST['idGasto'])?limpiarCadenas($_POST['idGasto']):"";
$descripcionGasto=isset($_POST['descripcionGasto'])?limpiarCadenas($_POST['descripcionGasto']):"";
$fechaGasto=isset($_POST['fechaGasto'])?limpiarCadenas($_POST['fechaGasto']):"";
$gasto=isset($_POST['gasto'])?limpiarCadenas($_POST['gasto']):"";
$idCategoria=isset($_POST['idCategoria'])?limpiarCadenas($_POST['idCategoria']):"";




//Agregamos lógica para fechas de registro y variables auxiliares 
date_default_timezone_set('America/Mexico_City');
$fechaActualizacion=date("Y-m-d H:i:s");
$idEmpActualiza= $_SESSION['id']; // Cambiar por el usuario de la sesion.


switch ($_GET["op"]){

   case 'listar':
      $rspta=$gastoA->listar();
      $data=Array();
      while ($reg=$rspta->fetch_object()){
        $data[]=array(
          "0"=>($reg->activo)?'<button class="btn btn-warning" title="Editar" onclick="mostrar('.$reg->idGasto.')"><i class="far fa-edit"></i></button>'.
          ' <button class="btn btn-danger" title="Desactivar" onclick="desactivar('.$reg->idGasto.')"><i class="far fa-window-close"></i></button>':'<button class="btn btn-warning" onclick="mostrar('.$reg->idGasto.')"><i class="fa fa-edit"></i></button>'.
          ' <button class="btn btn-primary" onclick="activar('.$reg->idGasto.')"><i class="far fa-check-square"></i></button>',
          "1"=>$reg->fechaGasto,
          "2"=>$reg->descripcionGasto,
          "3"=>$reg->nomCatego,
          "4"=>$reg->gasto,
          "5"=>$reg->fechaCreacion,
          "6"=>$reg->fechaActualizacion,
          "7"=>($reg->activo)?'<span class="badge badge-success">Activado</span>':'<span class="badge badge-danger">Desactivado</span>',
          "8"=>decryption($reg->nombreAct).' '.decryption($reg->primerApellidoAct),
        );
      }
      
      $results=array(
        "sEcho"=>1, //informacion para el datatables
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data
      );

      echo json_encode($results);
 
    break;
    //Agregamos caso de guardar y editar
    case 'guardaryeditar':
      //Agregamos validación para saber si tenemos que guardar una edición o crear un nuevo registro
      if(empty($idGasto)){
        //Ejecutamos la instrucción de insertar
        $rspta=$gastoA->insertar($fechaGasto, $descripcionGasto, $idCategoria, $gasto, $idEmpActualiza);
        //Configuramos el mensaje de respuesta
        echo $rspta!=0?"Gasto registrado":"Error gasto no resgistrado";
      }else{
        //Ejecutamos la instrucción de editar
        $rspta=$gastoA->editar($idGasto, $fechaGasto, $descripcionGasto,$idCategoria, $gasto, $fechaActualizacion, $idEmpActualiza);
        //Configuramos el mensaje de respuesta
        echo $rspta!=0?"Gasto actualizado":"Error gasto no actualizado";
        //echo $fechaActualizacion;
        
      }
      
    break;
    //Establecemos el caso para la opción mostrar
    case 'mostrar':
      //Llamamos al método mostrar de nuestro objeto
      $rspta=$gastoA->mostrar($idGasto);
      //codificamos a json el resultado para que viaje correctamente por request.
      /*write_log("ajax empleado mostrar");
      write_log(json_encode($rspta)); registros para el debug.log*/

      $rspta["descripcionGasto"] = $rspta["descripcionGasto"];
      $rspta["gasto"] = $rspta["gasto"];
      
      if(strlen(strtotime($rspta["fechaGasto"]))>1) {
        # code...
        $rspta["fechaGasto"]=date("Y-m-d",strtotime($rspta["fechaGasto"]));
      } 


      echo json_encode($rspta); 
    break;

    //Creamos el caso para desactivar
    case 'desactivar':
      //Mandamos a ejecutar el método para desactivar de nuestro objeto
      $rspta=$gastoA->desactivar($idGasto);
      //Configuramos mensaje de respuesta
      echo $rspta?"Gasto desactivado":"Error gasto no desactivado";
    break; 
    
    //Reutilizamos el código para implementar la funcionalidad de activar.
    case 'activar':
      $rspta=$gastoA->activar($idGasto);
      echo $rspta?"Gasto activado":"Error gasto no activado";
    break;


 
} 

?>