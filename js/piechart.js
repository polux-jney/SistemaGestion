google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
<?php
          $SQL = "SELECT * FROM user";
          $consulta = mysqli_query($conexion, $SQL);
          while ($resultado = mysqli_fetch_assoc($consulta)){
            echo "['" .$resultado['nombre']."', " .$resultado['edad']."],";
          }

?>
        ]);

        var options = {
          title: 'Mi Grafica de Barras'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }