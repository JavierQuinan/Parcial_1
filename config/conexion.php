<?php
class ClaseConectar
{
    public $conexion;
    protected $db;
    private $host = "localhost";
    private $usu = "root";
    private $clave = "";
    private $base = "negocio";

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->usu, $this->clave, $this->base);
        if (!$this->conexion) {
            die("Error al conectarse con MySQL: " . mysqli_connect_error());
        }
        mysqli_set_charset($this->conexion, "utf8");
        return $this->conexion;
    }

    public function ruta()
    {
        define('BASE_PATH', realpath(dirname(__FILE__) . '/../') . '/');
        // Autoload para clases
    }
}

// Crear una instancia de la clase y establecer la conexión
$conexion = new ClaseConectar();
$conexion->ProcedimientoConectar();
?>
