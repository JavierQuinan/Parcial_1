<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $Fecha = $_POST['fecha'];
    $Total = $_POST['total'];
    $Estado = $_POST['estado'];
    $Metodo_pago = $_POST['metodo_pago'];

    // Realizar la inserción en la base de datos
    require_once('../models/pedido.models.php'); // Incluye el modelo de pedidos
    $Pedido = new Pedido(); // Crea una instancia del modelo de pedidos

    $resultado = $Pedido->insertar($Fecha, $Total, $Estado, $Metodo_pago); // Insertar un nuevo pedido

    // Verificar el resultado de la inserción
    if ($resultado) {
        echo "Pedido insertado correctamente.";
    } else {
        echo "Error al insertar el pedido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pedido</title>
</head>
<body>
    <h1>Crear Nuevo Pedido</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="total">Total:</label>
        <input type="number" id="total" name="total" required><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required><br><br>

        <label for="metodo_pago">Método de Pago:</label>
        <input type="text" id="metodo_pago" name="metodo_pago" required><br><br>

        <input type="submit" value="Crear Pedido">
    </form>
</body>
</html>
