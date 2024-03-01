<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <!-- Enlace a tus archivos de estilos CSS -->
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
                    echo "<td>".$fila['ID_pedido']."</td>";
                    echo "<td>".$fila['Fecha']."</td>";
                    echo "<td>".$fila['Total']."</td>";
                    echo "<td>".$fila['Estado']."</td>";
                    echo "<td>".$fila['Método_pago']."</td>";
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="formulario_pedido.php" class="btn">Agregar Pedido</a>
        <!-- Enlace al formulario para agregar un nuevo pedido -->
    </div>
</body>
</html>
