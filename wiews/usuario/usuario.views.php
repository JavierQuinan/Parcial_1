<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <!-- Enlace a tus archivos de estilos CSS -->
</head>
<body>
    <div class="container">
        <h1>Lista de Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Sucursal ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $conexion = mysqli_connect('localhost', 'root', '', 'negocio') or die(mysqli_error($conexion));

                // Consulta para obtener los usuarios
                $consulta = "SELECT * FROM usuarios";
                $resultado = mysqli_query($conexion, $consulta);

                // Recorrer los resultados y mostrarlos en la tabla
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo "<tr>";
                    echo "<td>".$fila['idUsuarios']."</td>";
                    echo "<td>".$fila['Nombres']."</td>";
                    echo "<td>".$fila['Apellidos']."</td>";
                    echo "<td>".$fila['Correo']."</td>";
                    echo "<td>".$fila['contrasenia']."</td>";
                    echo "<td>".$fila['SucursalId']."</td>";
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="formulario_usuario.php" class="btn">Agregar Usuario</a>
        <!-- Enlace al formulario para agregar un nuevo usuario -->
    </div>
</body>
</html>
