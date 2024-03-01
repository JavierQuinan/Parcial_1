// Función para inicializar el formulario y cargar la lista de usuarios
function init() {
    $("#form_usuarios").on("submit", (e) => {
        GuardarEditarUsuario(e);
    });
    CargarListaUsuarios();
}

// Ruta para las operaciones en el controlador de usuarios
var rutaUsuarios = "../../controllers/usuarios.controllers.php?op=";

// Cargar la lista de usuarios al cargar la página
$().ready(() => {
    CargarListaUsuarios();
});

// Función para cargar la lista de usuarios desde la base de datos
var CargarListaUsuarios = () => {
    var html = "";
    $.get(
        rutaUsuarios + "todos",
        (ListaUsuarios) => {
            ListaUsuarios = JSON.parse(ListaUsuarios);
            $.each(ListaUsuarios, (index, usuario) => {
                html += `<tr>
                <td>${usuario.idUsuarios}</td>
                <td>${usuario.Nombres}</td>
                <td>${usuario.Apellidos}</td>
                <td>${usuario.Correo}</td>
                <td>${usuario.SucursalId}</td>
                <td>
                    <button class='btn btn-primary' onclick='EditarUsuario(${
                        usuario.idUsuarios
                    })'>Editar</button>
                    <button class='btn btn-warning' onclick='EliminarUsuario(${
                        usuario.idUsuarios
                    })'>Eliminar</button>
                </td>
                </tr>`;
            });
            $("#ListaUsuarios").html(html);
        }
    );
};

// Función para guardar o editar un usuario
var GuardarEditarUsuario = (e) => {
    e.preventDefault();
    var DatosFormularioUsuario = new FormData($("#form_usuarios")[0]);
    var accion = rutaUsuarios + "insertar"; // Cambiar a "editar" si es necesario

    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioUsuario,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Se guardó con éxito");
                CargarListaUsuarios();
                LimpiarCajas();
            } else {
                alert("Error al guardar");
            }
        },
    });
};

// Función para editar un usuario
var EditarUsuario = (idUsuario) => {
    $.post(
        rutaUsuarios + "uno",
        { idUsuarios: idUsuario },
        (usuario) => {
            usuario = JSON.parse(usuario);
            // Asignar los valores del usuario a los campos del formulario de edición
            $("#idUsuarios").val(usuario.idUsuarios);
            $("#Nombres").val(usuario.Nombres);
            $("#Apellidos").val(usuario.Apellidos);
            $("#Correo").val(usuario.Correo);
            $("#SucursalId").val(usuario.SucursalId);
            $("#ModalUsuarios").modal("show");
        }
    );
};

// Función para eliminar un usuario
var EliminarUsuario = (idUsuario) => {
    if (confirm("¿Estás seguro de que quieres eliminar este usuario?")) {
        $.post(
            rutaUsuarios + "eliminar",
            { idUsuarios: idUsuario },
            (resultado) => {
                resultado = JSON.parse(resultado);
                if (resultado === "ok") {
                    alert("Usuario eliminado correctamente");
                    CargarListaUsuarios();
                } else {
                    alert("Error al eliminar el usuario");
                }
            }
        );
    }
};

// Función para limpiar los campos del formulario
var LimpiarCajas = () => {
    $("#Nombres").val("");
    $("#Apellidos").val("");
    $("#Correo").val("");
    $("#SucursalId").val("");
    $("#ModalUsuarios").modal("hide");
};

// Inicializar la función al cargar la página
init();
