<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // Cambia si tienes una contraseña
$base_de_datos = "enterprise_rapr";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>