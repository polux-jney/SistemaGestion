<?php
if ($_SERVER['HTTPS'] != "on") { 
  $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; 
  header("Location: $url"); 
  exit; 
}

require 'vistas/header.php';

?>
  <!--========================================
       ============SLIDER DE IMG===================
       =========================================-->
    
       <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="6000">
            <video class="object-fit-scale d-block w-100" autoplay controls>
              <source src="img/turboreparaciones.mp4" type="video/mp4">
            </video>


          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="img/007.jpg" class="d-block w-100" alt="Slider3">
          </div>
          <div class="carousel-item" data-bs-interval="3000">
            <img src="img/009.jpg" class="d-block w-100" alt="Slider3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


       <!--========================================
       ============ INTRO ===================
       =========================================-->
    
      
    <section class="w-50 mx-auto text-center pt-5" id="intro">

        <h1 class="p-3 fs-2 border-top border-3">
        <span class=" text-primary">Reparaciones de PCs y smartphones</span> 
          Especialistas en soluciones tecnologicas.
        </h1>

        <p class="p-3 fs-4">
         En <span class="text-primary">TurboReparaciones</span>
         reparamos PCs y smartphones en tienda o domicilio.
        </p>
    </section>

       <!--========================================
       ============ SERVICIOS ===================
       =========================================-->
    
    <section class="container-fluid">
      <div class="row w-75 mx-auto servicio-fila">

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex my-5 icono-wrap">
          <img src="img/010.jpeg" alt="hardware" width="180" height="160">
          <div>
            <h3 class="fs-5 mt-4 px-4">Reparaciones de hardware</h3>
            <p class="px-4">Solucionamos prolemas de hardware como pantallas rotas, baterias
              agotas y mas.
            </p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex  my-5 icono-wrap">
          <img src="img/015.jpg" alt="software" width="180" height="160">
          <div>
            <h3 class="fs-5 mt-4 px-4">Reparaciones de software</h3>
            <p class="px-4">Solucionamos prolemas de software como virus, lentitud del
              sistema y mas.
            </p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex  my-5 icono-wrap">
          <img src="img/012.jpeg" alt="hardware" width="180" height="160">
          <div>
            <h3 class="fs-5 mt-4 px-4">Reparaciones de dispositivos moviles</h3>
            <p class="px-4">Solucionamos smartphones y tabletas de diferentes marcas y modelos.
            </p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12 d-flex  my-5 icono-wrap">
          <img src="img/013.jpg" alt="software" width="180" height="160">
          <div>
            <h3 class="fs-5 mt-4 px-4">Instalacion de software</h3>
            <p class="px-4">Instalamos software como virus, paqueteria de office y mas.
            </p>
          </div>
        </div>
      </div>
    </section>






<?php 
require 'vistas/footer.php';
?>