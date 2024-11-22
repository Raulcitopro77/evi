<?php
include 'conexion.php';

// Consultar datos de proveedores
$proveedores = $conn->query("SELECT * FROM proveedores");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Proveedores</title>
</head>
<body>
    <h1>Proveedores</h1>
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
                    <th>Producto Suministrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($proveedor = $proveedores->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $proveedor['id_proveedor']; ?></td>
                    <td><?php echo $proveedor['nombre']; ?></td>
                    <td><?php echo $proveedor['direccion']; ?></td>
                    <td><?php echo $proveedor['telefono']; ?></td>
                    <td><?php echo $proveedor['email']; ?></td>
                    <td><?php echo $proveedor['producto_suministrado']; ?></td>
                    <td>
                        <a href="editar.php?tabla=proveedores&id=<?php echo $proveedor['id_proveedor']; ?>">Editar</a>
                        <a href="eliminar.php?tabla=proveedores&id=<?php echo $proveedor['id_proveedor']; ?>" onclick="return confirm('¿Eliminar proveedor?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>