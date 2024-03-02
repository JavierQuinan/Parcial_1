<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Pedidos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Método de Pago</th>
                    <th>Acción</th> <!-- Nuevo encabezado para la columna de acción -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = mysqli_connect('localhost', 'root', '', 'negocio') or die(mysqli_error($conexion));

                // Consulta para obtener los pedidos
                $consulta = "SELECT * FROM pedido";
                $resultado = mysqli_query($conexion, $consulta);

                // Recorrer los resultados y mostrarlos en la tabla
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['ID_pedido'] . "</td>";
                    echo "<td>" . $fila['Fecha'] . "</td>";
                    echo "<td>" . $fila['Total'] . "</td>";
                    echo "<td>" . $fila['Estado'] . "</td>";
                    echo "<td>" . $fila['Metodo_pago'] . "</td>";
                    echo "<td>";
                    // Formulario para relacionar cliente y pedido
                    echo "<form action=\"relacion_cliente_pedido.php\" method=\"POST\">";
                    echo "<input type=\"hidden\" name=\"pedido_id\" value=\"" . $fila['ID_pedido'] . "\">"; // Campo oculto con el ID del pedido
                    echo "<label for=\"cliente_id\">ID Cliente:</label>";
                    echo "<input type=\"text\" name=\"cliente_id\" id=\"cliente_id\" required>";
                    echo "<button type=\"submit\">Relacionar</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
    <?php
    // Mostrar mensaje de confirmación si se ha relacionado correctamente
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'relacionado') {
        echo '<script>alert("Relación realizada correctamente");</script>';
    }
    ?>
</body>
</html>
