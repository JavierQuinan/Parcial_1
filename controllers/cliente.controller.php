<?php

error_reporting(0);
require_once('../config/sesiones.php');
require_once('../models/cliente.models.php'); 
$Cliente = new Cliente(); 

switch ($_GET['op']) {
    case 'todos':
        $datos = $Cliente->todos();
        if ($datos instanceof mysqli_result) {
            $clientes = array();
            while($row = mysqli_fetch_assoc($datos)){
                $clientes[] = $row;
            }
            echo json_encode($clientes);
        } else {
            echo "Error al obtener los clientes.";
        }
        break;
    case 'uno':
        $ID_cliente = $_POST['ID_cliente'];
        $datos = $Cliente->uno($ID_cliente); 
        if ($datos instanceof mysqli_result) {
            $Cliente = mysqli_fetch_assoc($datos);
            echo json_encode($liente);
        } else {
            echo "Error al obtener el cliente con el ID proporcionado.";
        }
        break;
    case 'insertar':
        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $resultado = $Cliente->insertar($Nombre, $Email, $Telefono, $Direccion); 
        echo json_encode($resultado);
        break;
    case 'actualizar':
        $ID_cliente = $_POST['ID_cliente'];
        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $datos = array();
        $datos = $Cliente->actualizar($ID_cliente, $Nombre, $Email, $Telefono, $Direccion); 
        echo json_encode($datos);
        break;
    case 'eliminar':
        $ID_cliente = $_POST['ID_cliente'];
        $datos = array();
        $datos = $Cliente->eliminar($ID_cliente); 
        echo json_encode($datos);
        break;
    default:
        echo "Operación no válida"; 
        break;
}

?>
