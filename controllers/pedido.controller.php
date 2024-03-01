<?php

error_reporting(0);
require_once('../config/sesiones.php');
require_once('../models/pedido.models.php'); // Importar el modelo de Pedido
$Pedido = new Pedido(); // Crear una instancia del modelo de Pedido

switch ($_GET['op']) {
    case 'todos':
        $datos = $Pedido->todos(); // Obtener todos los pedidos
        if ($datos instanceof mysqli_result) {
            $pedidos = array();
            while ($row = mysqli_fetch_assoc($datos)) {
                $pedidos[] = $row;
            }
            echo json_encode($pedidos);
        } else {
            echo "Error al obtener los pedidos.";
        }
        break;
    case 'uno':
        $ID_pedido = $_POST['ID_pedido'];
        $datos = $Pedido->uno($ID_pedido); // Obtener información de un pedido específico
        if ($datos instanceof mysqli_result) {
            $pedido = mysqli_fetch_assoc($datos);
            echo json_encode($pedido);
        } else {
            echo "Error al obtener el pedido con el ID proporcionado.";
        }
        break;
    case 'insertar':
        $Fecha = $_POST['Fecha'];
        $Total = $_POST['Total'];
        $Estado = $_POST['Estado'];
        $Metodo_pago = $_POST['Metodo_pago'];
        $resultado = $Pedido->insertar($Fecha, $Total, $Estado, $Metodo_pago); // Insertar un nuevo pedido
        if ($resultado) {
            echo json_encode("Pedido insertado correctamente.");
        } else {
            echo "Error al insertar el pedido.";
        }
        break;
    case 'actualizar':
        $ID_pedido = $_POST['ID_pedido'];
        $Fecha = $_POST['Fecha'];
        $Total = $_POST['Total'];
        $Estado = $_POST['Estado'];
        $Metodo_pago = $_POST['Metodo_pago'];
        $resultado = $Pedido->actualizar($ID_pedido, $Fecha, $Total, $Estado, $Metodo_pago); // Actualizar la información de un pedido
        if ($resultado) {
            echo json_encode("Pedido actualizado correctamente.");
        } else {
            echo "Error al actualizar el pedido.";
        }
        break;
    case 'eliminar':
        $ID_pedido = $_POST['ID_pedido'];
        $resultado = $Pedido->eliminar($ID_pedido); // Eliminar un pedido
        if ($resultado) {
            echo json_encode("Pedido eliminado correctamente.");
        } else {
            echo "Error al eliminar el pedido.";
        }
        break;
    default:
        echo "Operación no válida"; // Mostrar un mensaje si 'op' no es válido
        break;
}


?>
