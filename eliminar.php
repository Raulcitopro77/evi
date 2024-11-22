<?php
include 'conexion.php';

// Verificar que se reciban los parámetros necesarios
if (!isset($_GET['tabla']) || !isset($_GET['id'])) {
    die("Error: Parámetros incompletos.");
}

$tabla = $_GET['tabla'];
$id = $_GET['id'];

// Intentar eliminar el registro
$sql = "DELETE FROM $tabla WHERE id_$tabla = $id";
if ($conn->query($sql) === TRUE) {
    // Redirigir a la página de la tabla correspondiente después de eliminar
    header("Location: " . $tabla . ".php");
    exit;
} else {
    echo "Error al eliminar el registro: " . $conn->error;
}
?>