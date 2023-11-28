<?php
require "../config/conexion.php";
session_start();

if (!isset($_SESSION['id'])) {
  # code direccionar al login sin una seccion...
  header("Location:login");
}

$nombre = $_SESSION['nombre'];
$usuario = $_SESSION['usuario']; 
$tipo_usr = $_SESSION['tipo_usr'];
$id = $_SESSION['id'];





$desnombre=decryption($nombre);


date_default_timezone_set('America/Mexico_City');
$fechaActualizacion=date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Menu</title>

  <!-- Google Font: Source Sans Pro 
  <link rel="stylesheet" href="../public/plugins/fontgoogle/SourceSansPro.css">-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
  <!-- Font Awesome 
  <link rel="stylesheet" href="../public/plugins/fontawesome-free/css/all.min.css">-->
   <link rel="stylesheet" href="../public/plugins/fontawesome-free-6.4.0-web/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/dist/css/adminlte.min.css">
  <!-- css datatable -->
  <link rel="stylesheet" href="../public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/plugins/bootstrap-select/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="../public/plugins/toastr/toastr.min.css">

  <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
  

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" title="amburger menu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="../public/dist/img/avatar5.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $usuario; ?> </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="../public/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">

            <p>

            <?php     echo $desnombre;  ?>
            <br>
              <?php    echo $fechaActualizacion; ?>
              <br>
              <?php     ?>
            
            </p>
          </li>
         
          <!-- Menu Footer-->
          <li class="user-footer">
            
            <a href="../modelos/logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="../public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">TurboReparaciones</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"  data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Administracion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="departamento" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalogo Departamento</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categoria" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalago Categoria</p>
                </a>
              </li>
              <?php if ($tipo_usr == 1) {?>
              <li class="nav-item">
                <a href="empleado" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Catalago Empleados</p>
                </a>
              </li>
              <?php }?>
            </ul>
          </li> 
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Gastos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gasto" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Gasto</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
