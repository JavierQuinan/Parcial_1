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

    // Otras funciones de Realiza aquí...
}
?>
