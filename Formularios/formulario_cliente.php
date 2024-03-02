<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST['nombre'];
    $Email = $_POST['email'];
    $Telefono = $_POST['telefono'];
    $Direccion = $_POST['direccion'];

    require_once('../models/cliente.models.php'); // Incluye el modelo de clientes
    $Cliente = new Cliente(); // Crea una instancia del modelo de clientes

    $resultado = $Cliente->insertar($Nombre, $Email, $Telefono, $Direccion); // Insertar un nuevo cliente

    // Verificar el resultado de la inserción
    if ($resultado) {
        echo "Cliente insertado correctamente.";
    } else {
        echo "Error al insertar el cliente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Cliente</title>
</head>
<body>
    <h1>Crear Nuevo Cliente</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <input type="submit" value="Crear Cliente">
    </form>
</body>
</html>
