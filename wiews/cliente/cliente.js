function init() {
    $("#form_clientes").on("submit", (e) => {
        GuardarEditar(e);
    });
    
    CargaLista();
}

var ruta = "../../controllers/cliente.controllers.php?op="; 

$().ready(() => {
    init();
});

var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/cliente.controllers.php?op=todos",
        (ListClientes) => {
            ListClientes = JSON.parse(ListClientes);
            $.each(ListClientes, (index, cliente) => {
                html += `<tr>
                <td>${index + 1}</td>
                <td>${cliente.Nombre}</td>
                <td>${cliente.Email}</td>
                <td>${cliente.Teléfono}</td>
                <td>${cliente.Dirección}</td>
                </tr>`;
            });
            $("#ListaClientes").html(html);
        }
    );
};

// Función para guardar o editar un cliente
var GuardarEditar = (e) => {
    // Prevenir el comportamiento por defecto del formulario
    e.preventDefault();
    
    // Obtener los datos del formulario
    var DatosFormularioCliente = new FormData($("#form_clientes")[0]);
    
    // Definir la acción (insertar o editar) en el controlador de clientes
    var accion = "../../controllers/clientes.controllers.php?op=insertar";

    // Realizar la petición AJAX para enviar los datos al controlador
    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioCliente,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Se guardó con éxito");
                // Actualizar la lista de clientes después de guardar
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
    $("#Nombre").val("");
    $("#Email").val("");
    $("#Telefono").val("");
    $("#Direccion").val("");
};

// Inicializar la página al cargar
init();
