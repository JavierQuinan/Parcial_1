
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes y Pedidos</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrar Cliente</h2>
        <form action="controllers/cliente.controller.php?op=insertar" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="Nombre" id="nombre" required>
            <label for="email">Email:</label>
            <input type="email" name="Email" id="email" required>
            <label for="telefono">Telefono:</label>
            <input type="text" name="Telefono" id="telefono" required>
            <label for="direccion">Direccion:</label>
            <input type="text" name="Direccion" id="direccion" required>
            <button type="submit">Registrar Cliente</button>
        </form>

        <hr>

        <h2>Registrar Pedido</h2>
        <form action="controllers/pedido.controller.php?op=insertar" method="post">
            <label for="fecha">Fecha:</label>
            <input type="date" name="Fecha" id="fecha" required>
            <label for="total">Total:</label>
            <input type="text" name="Total" id="total" required>
            <label for="estado">Estado:</label>
            <input type="text" name="Estado" id="estado" required>
            <label for="metodo_pago">Método de Pago:</label>
            <input type="text" name="MetodoPago" id="metodo_pago" required>
            <button type="submit">Registrar Pedido</button>
        </form>

        <hr>

        <h2>Relacionar Cliente y Pedido</h2>
        <form action="controllers/relacion_cliente_pedido.php?op=relacionar_cliente_pedido" method="post">
            <label for="id_cliente">ID Cliente:</label>
            <input type="text" name="IDCliente" id="id_cliente" required>
            <label for="id_pedido">ID Pedido:</label>
            <input type="text" name="IDPedido" id="id_pedido" required>
            <button type="submit">Relacionar Cliente y Pedido</button>
        </form>
    </div>
</body>
</html>
