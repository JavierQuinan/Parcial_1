<?php
require_once('../config/conexion.php');

class Pedido
{
    /* Insertar un nuevo pedido */
    public function insertar($Fecha, $Total, $Estado, $MetodoPago)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO Pedido (Fecha, Total, Estado, Método_pago) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'siss', $Fecha, $Total, $Estado, $MetodoPago);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    /* Obtener todos los pedidos */
    public function todos()
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Pedido";

        $resultados = mysqli_query($conn, $cadena);
        return $resultados;
    }

    /* Obtener un solo pedido por ID */
    public function uno($ID_pedido)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM Pedido WHERE ID_pedido = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ID_pedido);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $pedido = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $pedido;
    }

    /* Actualizar un pedido */
    public function actualizar($ID_pedido, $Fecha, $Total, $Estado, $MetodoPago)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "UPDATE Pedido SET Fecha = ?, Total = ?, Estado = ?, Método_pago = ? WHERE ID_pedido = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'sissi', $Fecha, $Total, $Estado, $MetodoPago, $ID_pedido);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }

    /* Eliminar un pedido */
    public function eliminar($ID_pedido)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Pedido WHERE ID_pedido = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ID_pedido);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }
}
?>
