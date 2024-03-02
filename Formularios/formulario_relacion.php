<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relacionar Pedido y Cliente</title>
</head>
<body>
    <h1>Relacionar Pedido y Cliente</h1>
    <form action="../controllers/relacion_cliente_pedido.php?op=procesar_relacion" method="POST">
        <label for="cliente_id">ID Cliente:</label>
        <input type="text" name="cliente_id" id="cliente_id" required><br><br>
        <label for="pedido_id">ID Pedido:</label>
        <input type="text" name="pedido_id" id="pedido_id" required><br><br>
        <button type="submit">Relacionar Cliente y Pedido</button>
    </form> 
</body>
</html>
