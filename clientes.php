<?php
include 'conexion.php';
$clientes = $conn->query("SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="index.php">Volver al Inicio</a>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cliente = $clientes->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $cliente['id_cliente']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['direccion']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td><?php echo $cliente['email']; ?></td>
                    <td><?php echo $cliente['fecha_registro']; ?></td>
                    <td>
                    <a href="editar.php?tabla=clientes&id=1">Editar</a>
                        <a href="eliminar.php?tabla=clientes&id=1" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>