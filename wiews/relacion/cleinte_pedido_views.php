<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relación Cliente-Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button[type="submit"] {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Relación Cliente-Pedido</h1>
        <form id="form_relacion">
            <label for="cliente_id">ID Cliente:</label>
            <input type="text" name="cliente_id" id="cliente_id" required>
            <label for="pedido_id">ID Pedido:</label>
            <input type="text" name="pedido_id" id="pedido_id" required>
            <button type="submit">Relacionar Cliente y Pedido</button>
        </form>
    </div>

    <!-- Agrega tus enlaces a archivos de scripts aquí -->
    <script src="../wiews/relacion/relaciòn.js"></script>
</body>
</html>


