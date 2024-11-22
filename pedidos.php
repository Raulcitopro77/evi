<?php
include 'conexion.php';

// Consultar datos de pedidos
$pedidos = $conn->query("SELECT * FROM pedidos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Pedidos</title>
</head>
<body>
    <h1>Pedidos</h1>
    <a href="index.php">Volver al Inicio</a>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Cliente</th>
                    <th>Fecha Pedido</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Método de Pago</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pedido = $pedidos->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $pedido['id_pedido']; ?></td>
                    <td><?php echo $pedido['id_cliente']; ?></td>
                    <td><?php echo $pedido['fecha_pedido']; ?></td>
                    <td><?php echo $pedido['total']; ?></td>
                    <td><?php echo $pedido['estado']; ?></td>
                    <td><?php echo $pedido['metodo_pago']; ?></td>
                    <td>
                        <a href="editar.php?tabla=pedidos&id=<?php echo $pedido['id_pedido']; ?>">Editar</a>
                        <a href="eliminar.php?tabla=pedidos&id=<?php echo $pedido['id_pedido']; ?>" onclick="return confirm('¿Eliminar pedido?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>