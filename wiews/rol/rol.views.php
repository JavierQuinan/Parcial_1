<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Roles</title>
    <!-- Enlace a tus archivos de estilos CSS -->
</head>
<body>
    <div class="container">
        <h1>Lista de Roles</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = mysqli_connect('localhost', 'root', '', 'negocio') or die(mysqli_error($conexion));

                // Consulta para obtener los roles
                $consulta = "SELECT * FROM roles";
                $resultado = mysqli_query($conexion, $consulta);

                // Recorrer los resultados y mostrarlos en la tabla
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>".$fila['idRoles']."</td>";
                    echo "<td>".$fila['Rol']."</td>";
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="formulario_rol.php" class="btn">Agregar Rol</a>
        <!-- Enlace al formulario para agregar un nuevo rol -->
    </div>
</body>
</html>
