<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <!-- Enlace a tus archivos de estilos CSS -->
</head>
<body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = mysqli_connect('localhost', 'root', '', 'negocio') or die(mysqli_error($conexion));

                // Consulta para obtener los clientes
                $consulta = "SELECT * FROM cliente";
                $resultado = mysqli_query($conexion, $consulta);

                // Recorrer los resultados y mostrarlos en la tabla
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>".$fila['ID_cliente']."</td>";
                    echo "<td>".$fila['Nombre']."</td>";
                    echo "<td>".$fila['Email']."</td>";
                    echo "<td>".$fila['Teléfono']."</td>";
                    echo "<td>".$fila['Dirección']."</td>";
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="formulario_cliente.php" class="btn">Agregar Cliente</a>
        <!-- Enlace al formulario para agregar un nuevo cliente -->
    </div>
</body>
</html>
