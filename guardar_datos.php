<?php
include('conexion.php');

    // Tu código para procesar el formulario va aquí

// Recibir datos del formulario

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$nacionalidad = $_POST['nacionalidad'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];
$movil = $_POST['movil'];
$username = $_POST['username'];
$contrasena = $_POST['contrasena'];


$ins = $conexion -> query("INSERT INTO usuarios (nombres, apellidos, fecha_nacimiento, nacionalidad, sexo, correo, movil, username, contrasena) VALUES ('$nombres' , '$apellidos', '$fecha_nacimiento', '$nacionalidad', '$sexo' , '$correo', '$movil', '$username','$contrasena')");
if ($ins) {
	        echo "<h1> Registro guardo con exito. </h1>";
          }
else  {
	     echo "<h1> Registro no guardado. </h1> <br/>";
      }

 echo "<h1> <a href='1-index.html' </a> Inicie Sesion </h1>";
 
 


?>