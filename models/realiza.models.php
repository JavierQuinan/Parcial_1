<?php
require_once('../config/conexion.php');

class Realiza
{
    public function insertar($IDCliente, $IDPedido)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Realiza (ID_cliente, ID_pedido) VALUES (?, ?)";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'ii', $IDCliente, $IDPedido);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

}

// Verificar si se enviaron datos por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que se hayan recibido los datos esperados del formulario
    if (isset($_POST['cliente_id']) && isset($_POST['pedido_id'])) {
        // Obtener los datos del formulario
        $cliente_id = $_POST['cliente_id'];
        $pedido_id = $_POST['pedido_id'];

        // Crear una instancia de la clase Realiza
        $realiza = new Realiza();

        // Insertar la relación en la base de datos
        $resultado = $realiza->insertar($cliente_id, $pedido_id);

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            echo "La relación entre cliente y pedido se ha insertado correctamente.";
        } else {
            echo "Ha ocurrido un error al insertar la relación entre cliente y pedido.";
        }
    } else {
        echo "No se recibieron todos los datos necesarios del formulario.";
    }
}
?>
