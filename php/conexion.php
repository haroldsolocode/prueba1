<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "pastillero_virtual02";

// Crear una conexión a la base de datos
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

?>

