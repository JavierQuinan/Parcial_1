<?php
require_once('../config/conexion.php');

class Cliente
{
    /* Insertar un nuevo cliente */
    public function insertar($Nombre, $Email, $Telefono, $Direccion)
{
    $con = new ClaseConectar();
    $conn = $con->ProcedimientoConectar();
    $cadena = "INSERT INTO cliente (Nombre, Email, Telefono, Direccion) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $cadena);
    mysqli_stmt_bind_param($stmt, 'ssss', $Nombre, $Email, $Telefono, $Direccion);
    $resultado = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($resultado) {
        return true;
    } else {
        return false;
    }
}


    /* Obtener todos los clientes */
    public function todos()
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM cliente";

        $resultados = mysqli_query($conn, $cadena);
        return $resultados;
    }

    /* Obtener un solo cliente por ID */
    public function uno($ID_cliente)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM cliente WHERE ID_cliente = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ID_cliente);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $cliente = mysqli_fetch_assoc($resultado);

        mysqli_stmt_close($stmt);
        return $cliente;
    }

    /* Actualizar un cliente */
    public function actualizar($ID_cliente, $Nombre, $Email, $Telefono, $Direccion)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "UPDATE Cliente SET Nombre = ?, Email = ?, Teléfono = ?, Dirección = ? WHERE ID_cliente = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'ssssi', $Nombre, $Email, $Telefono, $Direccion, $ID_cliente);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }

    /* Eliminar un cliente */
    public function eliminar($ID_cliente)
    {
        $con = new ClaseConectar();
        $conn = $con->ProcedimientoConectar();
        $cadena = "DELETE FROM Cliente WHERE ID_cliente = ?";

        $stmt = mysqli_prepare($conn, $cadena);
        mysqli_stmt_bind_param($stmt, 'i', $ID_cliente);
        $resultado = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resultado;
    }
}
?>
