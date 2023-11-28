<!--Archivo Inicio -->
<!--al principio -->
<?php

require 'cabecero.php';
require_once '../config/conexion.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Legacy User Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Legacy User Menu</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        <div id="piechart" style="width: 800px; height: 500px;"></div>  
          
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!--al Final -->



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
          $SQL = "SELECT c.idGasto, c.fechaGasto, c.descripcionGasto, c.idCategoria, SUM(c.gasto), c.activo,
          c.fechaCreacion, c.fechaActualizacion, c.idEmpActualiza, d.descripcion as nomCatego
           FROM gastos c INNER JOIN categorias d
         ON c.idCategoria = d.idCategoria GROUP BY nomCatego ";
          $consulta = mysqli_query($conexion, $SQL);
          while ($resultado = mysqli_fetch_assoc($consulta)){
            echo "['" .$resultado['nomCatego']."', " .$resultado['SUM(c.gasto)']."],";
          }

?>
        ]);

        var options = {
          title: 'Gastos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<?php 
require 'piepagina.php';
?>