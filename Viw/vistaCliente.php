<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleTabla.css" type="text/css"/>
    <title>Vista Cliente</title>
</head>

<body>

    <h1 class="text-center">ApiCarRent CLIENTES</h1>

    <div id="tabla-container"></div>

    <?php
    // Assuming the index() function returns JSON data
    require_once "/xampp/htdocs/apiCarRent-main/index.php";
    $clientesJson = new MisClientes();
    $datajso = $clientesJson->index();

    ?>

    <script>
        var cliente = <?php echo $datajso; ?>;
        console.log(cliente);

        // Function to generate the HTML table
        function generarTabla(cliente) {
            var html = '<table>';
            html += '<tr><th>NOMBRE</th><th>APELLIDO_P</th><th>APELLIDO_M</th><th>Fecha de Nacimiento</th><th>CURP</th><th>TELEFONO</th><th>CALLE</th><th>NUM_EXT</th><th>COLONIA</th><th>MUNICIPIO</th><th>ESTADO</th><th>CP</th></tr>';
            //Verificamos si cliente e sun array
            if (Array.isArray(cliente)) {
                //Generar las filas de la tabla
                cliente.forEach(function(clientes) {
                    html += '<tr>';
                    html += '<td>' + clientes.Nombre + '</td>';
                    html += '<td>' + clientes.ApellidoP + '</td>';
                    html += '<td>' + clientes.ApellidoM + '</td>';
                    html += '<td>' + cliente.AnioNacimiento + '</td>';
                    html += '<td>' + clientes.CURP + '</td>';
                    html += '<td>' + clientes.Telefono + '</td>';
                    html += '<td>' + clientes.Calle + '</td>';
                    html += '<td>' + clientes.NumExt + '</td>';
                    html += '<td>' + clientes.Colonia + '</td>';
                    html += '<td>' + clientes.Municipio + '</td>';
                    html += '<td>' + clientes.Estado + '</td>';
                    html += '<td>' + clientes.CP + '</td>';
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
        tablaContainer.innerHTML = generarTabla(cliente);

    </script>

    <!-- Bootstrap JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>