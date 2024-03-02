<?php
error_reporting(0);
require_once('../config/sesiones.php');
require_once('../models/cliente.models.php');
require_once('../models/pedido.models.php');
require_once('../models/realiza.models.php');
require_once('../wiews/cliente/cliente.views.php');
require_once('../wiews/pedido/pedido.views.php');
require_once('../wiews/relacion/cleinte_pedido_views.php');

$Cliente = new Cliente();
$Pedido = new Pedido();
$Realiza = new Realiza();

switch ($_GET['op']) {
    case 'insertar_cliente':
        $Nombre = $_POST['Nombre'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $resultado = $Cliente->insertar($Nombre, $Email, $Telefono, $Direccion);
        echo json_encode($resultado);
        break;

    case 'insertar_pedido':
        $Fecha = $_POST['Fecha'];
        $Total = $_POST['Total'];
        $Estado = $_POST['Estado'];
        $MetodoPago = $_POST['Metodo_pago'];
        $resultado = $Pedido->insertar($Fecha, $Total, $Estado, $Metodo_pago);
        echo json_encode($resultado);
        break;

        case 'relacionar_cliente_pedido':
            $IDCliente = $_POST['cliente_id']; // Aquí se ajusta el nombre del campo
            $IDPedido = $_POST['pedido_id']; // Aquí se ajusta el nombre del campo
            $resultado = $Realiza->insertar($IDCliente, $IDPedido);
            echo json_encode($resultado);
            break;
        

    default:
        echo "Operación no válida";
        break;
}
?>
