// Función para inicializar la página
function init() {
    // Asociar el evento submit del formulario a la función GuardarEditar
    $("#form_pedidos").on("submit", (e) => {
        GuardarEditar(e);
    });
    
    // Cargar la lista de pedidos al cargar la página
    CargaLista();
}

// Ruta para las operaciones en el controlador de pedidos
var ruta = "../../controllers/pedidos.controllers.php?op="; 

// Función que se ejecuta cuando el DOM está listo
$().ready(() => {
    // Inicializar la página
    init();
});

// Función para cargar la lista de pedidos
var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/pedidos.controllers.php?op=todos",
        (ListPedidos) => {
            ListPedidos = JSON.parse(ListPedidos);
            $.each(ListPedidos, (index, pedido) => {
                html += `<tr>
                <td>${index + 1}</td>
                <td>${pedido.Fecha}</td>
                <td>${pedido.Total}</td>
                <td>${pedido.Estado}</td>
                <td>${pedido.Método_pago}</td>
                </tr>`;
            });
            $("#ListaPedidos").html(html);
        }
    );
};

// Función para guardar o editar un pedido
var GuardarEditar = (e) => {
    // Prevenir el comportamiento por defecto del formulario
    e.preventDefault();
    
    // Obtener los datos del formulario
    var DatosFormularioPedido = new FormData($("#form_pedidos")[0]);
    
    // Definir la acción (insertar o editar) en el controlador de pedidos
    var accion = "../../controllers/pedidos.controllers.php?op=insertar";

    // Realizar la petición AJAX para enviar los datos al controlador
    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioPedido,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Se guardó con éxito");
                // Actualizar la lista de pedidos después de guardar
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
    $("#Fecha").val("");
    $("#Total").val("");
    $("#Estado").val("");
    $("#Método_pago").val("");
};

// Inicializar la página al cargar
init();
