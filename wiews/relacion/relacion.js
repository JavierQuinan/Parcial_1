// Función para inicializar el formulario y cargar la lista de relaciones
function init() {
    $("#form_relacion").on("submit", (e) => {
        GuardarRelacion(e);
    });
}

// Ruta para las operaciones en el controlador de relaciones
var rutaRelacion = "../controllers/relacion_cliente_pedido.php?op=";

// Inicializar la función al cargar la página
$().ready(() => {
    init();
});

// Función para guardar una nueva relación entre cliente y pedido
var GuardarRelacion = (e) => {
    e.preventDefault();
    var DatosFormularioRelacion = new FormData($("#form_relacion")[0]);

    $.ajax({
        url: rutaRelacion + "insertar",
        type: "post",
        data: DatosFormularioRelacion,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Relación guardada con éxito");
                LimpiarCajas();
            } else {
                alert("Error al guardar la relación");
            }
        },
    });
};

// Función para limpiar los campos del formulario
var LimpiarCajas = () => {
    $("#cliente_id").val("");
    $("#pedido_id").val("");
};
