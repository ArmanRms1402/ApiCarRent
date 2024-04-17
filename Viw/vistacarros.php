<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleTabla.css" type="text/css"/>
    <title>Vista Cliente</title>

</head>

<body class="animated-main">

    <h1 class="text-center animated-main">ApiCarRENT CARROS</h1>

    <div id="tabla-container" class="text-center"></div>
    <img src="https://th.bing.com/th/id/OIP.-W7wkTcs_b5iIH6Sd3-NaQHaEa?rs=1&pid=ImgDetMain" class="img-fluid animated-main" alt="logo">

    <?php
    require_once "/xampp/htdocs/apiCarRent-main/index.php";
    $carrosJson = new MisCarros();
    $dataJson = $carrosJson->index();

    ?>

    <script>
        // Contiene los datos JSON obtenidos del servidor
        var carro = <?php echo $dataJson; ?>;

        console.log(carro);

        // Funcion para crear la tabla
        function generarTabla(carro) {
            var html = '<table>';
            html += '<tr><th>Matricula</th><th>Modelo</th><th>Año</th><th>Marca</th><th>VIN</th><th>Tarifa</th><th>Caracteristicas</th><th>Tipo Transmision</th></tr>';
            // Verificar si carro es un array
            if (Array.isArray(carro)) {
                // Generar las filas de la tabla
                carro.forEach(function(carros) {
                    html += '<tr>';
                    html += '<td>' + carros.Matricula + '</td>';
                    html += '<td>' + carros.Modelo + '</td>';
                    html += '<td>' + carros.Anio + '</td>';
                    html += '<td>' + carros.marca + '</td>';
                    html += '<td>' + carros.VIN + '</td>';
                    html += '<td>' + carros.tarifa + '</td>';
                    html += '<td>' + carros.Caract + '</td>';
                    html += '<td>' + carros.tipoTransmicion + '</td>';
                    html += '</tr>';
                });
            } else {
                // Si no es un array, mostrar un mensaje de error en la tabla
                html += '<tr><td colspan="7">Error: No se pudo cargar los datos</td></tr>';
            }
            html += '</table>';
            return html;
        }

        var tablaContainer = document.getElementById('tabla-container');
        tablaContainer.innerHTML = generarTabla(carro);
    </script>

    <!-- Archivo JavaScript de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>