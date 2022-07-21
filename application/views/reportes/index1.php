

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
</head>

<body>


<h1>REPORTE GENERAL</h1>

<input type="button" value="Graficar" id="btnBuscar" onclick="cargarDatos()" class="nav-item nav-link">


<div class="orientacion" >
    <canvas id="myChart" width="400" height="100">
    </canvas>
</div>




</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>


<script>

function cargarDatos(){
    $.ajax({
        url:'traerDatosBarrios',//revisar url para mostrar data
        type:'POST'

    }).done(function(resp){
        var data1=JSON.parse(resp);

        var propietario=[];
        var id1=[];

        for(var i=0;i<(data1.datos).length; i++){
            propietario.push(data1['datos'][i]['propietario']);
            id.push(data1['datos'][i]['id1']);

        }
        const ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: propietario,
                    datasets: [{
                        label: 'REPORTE CANTONES',
                        data: id,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

    })
}




</script>
