// Función para inicializar la página
function init() {
    // Asociar el evento submit del formulario a la función GuardarEditar
    $("#form_roles").on("submit", (e) => {
        GuardarEditar(e);
    });
    
    // Cargar la lista de roles al cargar la página
    CargaLista();
}

// Ruta para las operaciones en el controlador de roles
var ruta = "../../controllers/roles.controllers.php?op="; 

// Función que se ejecuta cuando el DOM está listo
$().ready(() => {
    // Inicializar la página
    init();
});

// Función para cargar la lista de roles
var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/roles.controllers.php?op=todos",
        (ListRoles) => {
            ListRoles = JSON.parse(ListRoles);
            $.each(ListRoles, (index, rol) => {
                html += `<tr>
                <td>${index + 1}</td>
                <td>${rol.Rol}</td>
                </tr>`;
            });
            $("#ListaRoles").html(html);
        }
    );
};

// Función para guardar o editar un rol
var GuardarEditar = (e) => {
    // Prevenir el comportamiento por defecto del formulario
    e.preventDefault();
    
    // Obtener los datos del formulario
    var DatosFormularioRol = new FormData($("#form_roles")[0]);
    
    // Definir la acción (insertar o editar) en el controlador de roles
    var accion = "../../controllers/roles.controllers.php?op=insertar";

    // Realizar la petición AJAX para enviar los datos al controlador
    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioRol,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Se guardó con éxito");
                // Actualizar la lista de roles después de guardar
                CargaLista();
                // Limpiar los campos del formulario
                LimpiarCajas();
            } else {
                alert("Error al guardar");
            }
        },
    });
};

// Función para limpiar los campos del formulario
var LimpiarCajas = () => {
    $("#Rol").val("");
};

// Inicializar la página al cargar
init();
