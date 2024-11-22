<?php
include 'conexion.php';

// Verificar que se reciban los parámetros necesarios
if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
    die("Error: Parámetros incompletos.");
}

$tabla = $conn->real_escape_string($_GET['tabla']); // Sanitización del nombre de la tabla
$id = intval($_GET['id']); // Convertir ID a un número entero para evitar inyecciones SQL

// Consultar el registro que se desea editar
$sql = "SELECT * FROM $tabla WHERE id_$tabla = $id";
$resultado = $conn->query($sql);

// Verificar si el registro existe
if ($resultado && $resultado->num_rows > 0) {
    $registro = $resultado->fetch_assoc();
} else {
    die("Error: Registro no encontrado.");
}

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $actualizacion = [];
    foreach ($_POST as $campo => $valor) {
        $valor_limpio = $conn->real_escape_string($valor); // Sanitizar cada valor
        $actualizacion[] = "$campo = '$valor_limpio'";
    }
    $sql_update = "UPDATE $tabla SET " . implode(', ', $actualizacion) . " WHERE id_$tabla = $id";
    if ($conn->query($sql_update) === TRUE) {
        header("Location: " . $tabla . ".php");
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Editar Registro</title>
</head>
<body>
    <h1>Editar Registro en <?php echo ucfirst($tabla); ?></h1>
    <a href="<?php echo $tabla; ?>.php">Volver</a>
    <form method="POST">
        <?php foreach ($registro as $campo => $valor): ?>
            <?php if ($campo != "id_$tabla"): ?>
            <label for="<?php echo $campo; ?>"><?php echo ucfirst(str_replace('_', ' ', $campo)); ?>:</label>
            <input type="text" id="<?php echo $campo; ?>" name="<?php echo $campo; ?>" value="<?php echo htmlspecialchars($valor); ?>" required>
            <br>
            <?php endif; ?>
        <?php endforeach; ?>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
