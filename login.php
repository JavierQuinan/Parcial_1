<?php
require_once("./config/conexion.php");

$conexion = new ClaseConectar();
$conexion->ProcedimientoConectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $contrasenia = $_POST["password"];
    
    $consulta = "SELECT * FROM usuarios WHERE correo = ? AND contrasenia = ?";
    
    $stmt = $conexion->conexion->prepare($consulta);
    
    if ($stmt) {
        $stmt->bind_param("ss", $correo, $contrasenia);
        
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows == 1) {
            header("Location: index.php");
            exit(); 
        } else {
            $error = "El correo o la contraseña son incorrectos. Por favor, intenta de nuevo.";
        }
    } else {
        $error = "Ocurrió un error al intentar iniciar sesión. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Acceso</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo">
                  Mi Negocio Fquinteros
                </div>
                <form id="loginform" action="login.php" method="POST"> <!-- Añade el atributo action con el valor 'login.php' para enviar los datos al script PHP -->
                    <input type="email" name="correo" placeholder="Correo" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <button type="submit" title="Ingresar">Login</button>
                </form>
                <?php if (isset($error)): ?>
                    <div class="mensaje-error"><?php echo $error; ?></div>
                <?php elseif (isset($mensaje)): ?>
                    <div class="mensaje-exito"><?php echo $mensaje; ?></div>
                <?php endif; ?>
                <div class="pie-form">
                    <a href="#">¿Perdiste tu contraseña?</a>
                    <a href="#">¿No tienes Cuenta? Regístrate</a>
                </div>
            </div>
            <div class="inferior">
                <a href="#">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
