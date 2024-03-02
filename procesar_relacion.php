<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $cliente_id = $_POST['cliente_id'];
    $pedido_id = $_POST['pedido_id'];

    // Realizar la inserción en la base de datos
    require_once('../models/realiza.models.php'); // Incluir el modelo de la relación
    $Relacion = new Realiza(); // Crear una instancia del modelo de la relación

    $resultado = $Relacion->insertar($cliente_id, $pedido_id); // Insertar la relación cliente-pedido

    // Verificar el resultado de la inserción
    if ($resultado) {
        echo "Relación cliente-pedido insertada correctamente.";
    } else {
        echo "Error al insertar la relación cliente-pedido.";
    }
}
?>
