<?php
$host = "localhost";       // Servidor (usualmente localhost si están en el mismo servidor)
$usuario = "u534818317_isaacR";   // Usuario de la base de datos
$contrasena = "Mafe231219";  // Contraseña del usuario
$base_de_datos = "u534818317_isaac"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>