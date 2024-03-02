<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
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
                    echo "<td>" . $fila['Metodo_pago'] . "</td>"; // Ajustado aquí
                    echo "</tr>";
                }

                // Cerrar la conexión
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="formulario_pedido.php" class="btn">Agregar Pedido</a>
    </div>
</body>

</html>