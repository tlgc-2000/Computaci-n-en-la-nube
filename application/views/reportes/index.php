
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <title>Reportes</title>
<script src="chart.min.js"></script>

</head>
<body>
<h1><center>REPORTE GENERAL DE LOS TERRENOS EN LA CUIDAD DE LATACUNGA UTC</center></h1>
<?php

$con = new mysqli("localhost","root","","ci_google_maps_api"); // Conectar a la BD
//$id = $_POST["Cotopaxi(Tanicuchi)"];
$sql = "SELECT producto, COUNT(producto) AS producto1 FROM locations GROUP BY producto HAVING COUNT(producto)>1"; // Consulta SQL
$query = $con->query($sql); // Ejecutar la consulta SQL
$data1 = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data1[]=$r; // Guardar los resultados en la variable $data
}

?>

<?php
$con = new mysqli("localhost","root","","ci_google_maps_api"); // Conectar a la BD
//$id = $_POST["Cotopaxi(Tanicuchi)"];
$sql1 = "SELECT COUNT(parroquia) AS parroquia1, parroquia FROM locations GROUP BY parroquia HAVING COUNT(parroquia)>1"; // Consulta SQL
$query1 = $con->query($sql1); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r1 = $query1->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r1; // Guardar los resultados en la variable $data
}
?>

<?php
$con = new mysqli("localhost","root","","ci_google_maps_api"); // Conectar a la BD
//$id = $_POST["Cotopaxi(Tanicuchi)"];
$sql2 = "SELECT COUNT(barrio) AS barrio1, barrio FROM locations GROUP BY barrio HAVING COUNT(barrio)>1"; // Consulta SQL
$query2 = $con->query($sql2); // Ejecutar la consulta SQL
$data2 = array(); // Array donde vamos a guardar los datos
while($r2 = $query2->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data2[]=$r2; // Guardar los resultados en la variable $data
}
?>

<?php
$con = new mysqli("localhost","root","","ci_google_maps_api"); // Conectar a la BD
//$id = $_POST["Cotopaxi(Tanicuchi)"];
$sql3 = "SELECT COUNT(producto) AS producto1,parroquia,barrio,producto FROM locations GROUP BY barrio HAVING COUNT(producto)>1"; // Consulta SQL
$query3 = $con->query($sql3); // Ejecutar la consulta SQL
$data3 = array(); // Array donde vamos a guardar los datos
while($r3 = $query3->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data3[]=$r3; // Guardar los resultados en la variable $data
}
?>
</body>


</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>

<canvas  id="chart1" style=" background-color: #C6FAF0;  width:100%;" height="500%" ></canvas>
<script>
var ctx1 = document.getElementById("chart1");
var data1 = {
        labels: [
        <?php foreach($data1 as $d):?>
        "<?php echo $d->producto?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Terrenos',
            data: [
        <?php foreach($data1 as $d):?>
        <?php echo $d->producto1;?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#00FFFF",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options1 = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx1, {
    type: 'bar', /* valores: line, bar*/
    data: data1,
    options: options1
});
</script>



<canvas id="chart2" style="background-color: #44E04B; width:100%;" height="500%"></canvas>
<script>
var ctx2 = document.getElementById("chart2");
var data2 = {
        labels: [
        <?php foreach($data as $d):?>
        "<?php echo $d->parroquia?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Parroquias/Barrios',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->parroquia1;?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#00FF00",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options2 = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart2 = new Chart(ctx2, {
    type: 'bar', /* valores: line, bar*/
    data: data2,
    options: options2
});
</script>




<canvas id="chart3" style=" background-color: #F95A4A; width:100%;" height="500%"></canvas>
<script>
var ctx3 = document.getElementById("chart3");
var data3 = {
        labels: [
        <?php foreach($data2 as $d):?>
        "<?php echo $d->barrio?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Barrios/Terrenos',
            data: [
        <?php foreach($data2 as $d):?>
        <?php echo $d->barrio1;?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#FF0000",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options3 = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart3 = new Chart(ctx3, {
    type: 'bar', /* valores: line, bar*/
    data: data3,
    options: options3
});
</script>

</body>
</html>



<canvas id="chart4" style="background-color: #F6F94A; width:100%;" height="500%"></canvas>
<script>
var ctx4 = document.getElementById("chart4");
var data4 = {
        labels: [
        <?php foreach($data3 as $d2):?>
        "<?php echo $d2->parroquia." ".$d2->barrio." ".$d2->producto?>",
        <?php endforeach; ?>
        ],
        datasets: [{
            label: " ",
            data: [
        <?php foreach($data3 as $d2):?>
        <?php echo $d2->producto1;?>,
        <?php endforeach; ?>
            ],
            backgroundColor: "#FFFF00",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options4 = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart4 = new Chart(ctx4, {
    type: 'bar', /* valores: line, bar*/
    data: data4,
    options: options4
});
</script>
