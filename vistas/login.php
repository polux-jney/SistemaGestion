<?php
require "../config/conexion.php";
session_start();

$usr=isset($_POST['usr'])?limpiarCadenas($_POST['usr']):"";
$pwd=isset($_POST['pwd'])?limpiarCadenas($_POST['pwd']):"";

if ($_POST) {
   # code...
   $usr = $_POST['usr'];
   $pwd = $_POST['pwd'];

   $sql = "SELECT
   e.idEmpleado, 
   e.nombre,  
   e.esJefe, 
   e.usr, 
   e.pwd
   FROM empleados e
   WHERE  usr='$usr' AND activo=1 ";
  
  $resultado = $conexion-> query($sql);
  $num = $resultado->num_rows;

  if ($num>0) {
   # code...
      $row = $resultado->fetch_assoc();
      $pwd_db = $row['pwd'];

      $pwd_c = set_pass($pwd);

      $validacion=val_pass($pwd, $pwd_db);
      
 /*  echo  " <h2>La respuesta de la validación es: ".json_encode($validacion)."</h2><br>";
   echo  " <h6>passswwd: ".$pwd_db."</h6><br>";
   echo  " <h6>passsccc: ".$pwd."</h6><br>";*/

      if ($validacion == true) {
         # code...

         $_SESSION['id'] = $row['idEmpleado'];
         $_SESSION['nombre'] = $row['nombre'];
         $_SESSION['usuario'] = $row['usr'];
         $_SESSION['tipo_usr'] = $row['esJefe']; 
            
         header("Location:inicio");

      }else{

        echo  '<div class="alert alert-danger text-center " role="alert" >        
        Usuario O Contraseña Error 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

      
      }
      

  }else {
   # code...

   
   echo  '<div class="alert alert-danger text-center " role="alert" >        
   Usuario O Contraseña Error 
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>';
   
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <link rel="stylesheet" href="../css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <!-- <link rel="stylesheet" href="css/all.min.css"> -->
   <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
   <!-- alert-->
   
   <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
   <title>Inicio de sesión</title>
</head>

<body>
   <img class="wave" src="../img/wave.png">
   <div class="container">
      <div class="img">
         <img src="../img/bg.svg">
      </div> 
      <div class="login-content">
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <img src="../img/avatar.svg">
            <h2 class="title">BIENVENIDO</h2>
          
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <input id="usr" type="text" class="input" name="usr" placeholder="Usuario" required >
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div"> 
                  <input type="password" id="pwd" class="input" name="pwd" placeholder="Contraseña" required>
               </div>
            </div>
            

            <div class="text-center">
               <br>
            </div>
            <input name="btningresar" class="btn btn-primary" type="submit" value="INICIAR SESION">
            <a class="btn btn-danger" href="/">Cancelar</a>

         </form>
      </div>
   </div>
   <script src="../js/fontawesome.js"></script>
   <script src="../js/main.js"></script>
   <script src="../js/main2.js"></script>
   <script src="../js/jquery.min.js"></script>
   <script src="../js/bootstrap.js"></script>
   <script src="../js/bootstrap.bundle.js"></script>
   

</body>

</html>