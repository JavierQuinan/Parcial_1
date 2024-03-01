<?php

error_reporting(0);
require_once('../config/sesiones.php');
require_once('../models/usuario.models.php');
$Usuario = new Usuarios();

switch ($_GET['op']) {
    case 'todos':
        $datos = array();
        $datos = $Usuarios->todos();
        while($row = mysqli_fetch_assoc($datos)){
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $UserID = $_POST['UserID'];
        $datos = array();
        $datos = $Usuarios->uno($UserID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    case 'insertar':
        //$UserID = $_POST['UserID'];
        $Nombre = $_POST['Nombre'];
        $CorreoElectronico = $_POST['CorreoElectronico'];
        $Clave = $_POST['contrasenia'];
        $RolID = $_POST['RolID'];
        $datos = array();
        $datos = $Usuarios->insertar($Nombre, $CorreoElectronico, $Clave, $RolID);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $UserID = $_POST['UserID'];
        $Nombre = $_POST['Nombre'];
        $CorreoElectronico = $_POST['CorreoElectronico'];
        $Clave = $_POST['contrasenia'];
        $RolID = $_POST['RolID'];
        $datos = array();
        $datos = $Usuarios->actualizar($UserID, $Nombre, $CorreoElectronico, $Clave, $RolID);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $UserID = $_POST['UserID'];
        $datos = array();
        $datos = $Usuarios->eliminar($UserID);
        echo json_encode($datos);
        break;
    case 'login':
            // Obtener los datos del formulario
            $correo = $_POST['correo'];
            $contrasenia = $_POST['contrasenia'];
            
            // Verificar si las variables no están vacías
            if (empty($correo) || empty($contrasenia)) {
                // Redirigir con error si faltan datos
                header("Location: ../login.php?op=2");
                exit();
            }
        
            // Realizar el proceso de inicio de sesión
            try {
                $datos = $Usuarios->login($correo, $contrasenia);
                $res = mysqli_fetch_assoc($datos);
        
                // Verificar si se encontró un usuario con las credenciales proporcionadas
                if (is_array($res) && count($res) > 0) {
                    // Guardar información del usuario en la sesión
                    $_SESSION["idUsuarios"] = $res["UserID"];
                    $_SESSION["Usuarios_Nombres"] = $res["Nombre"];
                    $_SESSION["Usuarios_Correo"] = $res["CorreoElectronico"];
                    $_SESSION["Usuario_IdRoles"] = $res["RolID"];
                    $_SESSION["Rol"] = $res["Nombre_Rol"];
        
                    // Redirigir al index.php
                    header("Location: ../index.php");
                    exit();
                } else {
                    // Redirigir con error si las credenciales son incorrectas
                    header("Location: ../login.php?op=1");
                    exit();
                }
            } catch (Throwable $th) {
                // Manejar cualquier excepción
                header("Location: ../login.php?op=1");
                exit();
            }
            break;
           
}

?>
