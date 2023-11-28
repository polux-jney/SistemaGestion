<?php 

if ($_SERVER['HTTPS'] != "on") { 
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
    header("Location: $url"); 
    exit; 
}

//if (strlen(session_id())<1)
  //session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TurboReparaciones</title>

    <!-- Incluir Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
    <!-- Incluir Bootstrap iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!--css-->
    <link rel="stylesheet" href="../css/main.css">

    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    
   
</head>
<body>

       <!--========================================
       ============ ENCABEZADO  ===================
       =========================================-->

    <header class="container-fluid bg-primary d-flex justify-content-center">
        <p class="text-light mb-0 p-0 fs-6">Contactanos (55)-324-934-32</p>
    </header>

    <!--Navbar-->

    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3" id="menu">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><span class="text-primary fs-5 fw-bold">
            TurboReparaciones</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Inicio</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../vistas/nosotros">¿Quienes somos?</a>
              </li>        
              
              <li class="nav-item">
                <a class="nav-link" href="../vistas/contacto">Contacto</a>
              </li>

            </ul>
            <form class="d-flex">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
                <a class="nav-link" href="../vistas/login">Ingresar</a>
              </li>
             </ul>
          </form>
          </div>
        </div>
      </nav>
