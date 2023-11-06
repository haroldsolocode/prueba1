<?php
include('conexion.php');
session_start(); // Inicia la sesión (debe estar al principio del archivo)
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Pastillero Virtual - Bienvenida</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <style>
        h1, h4 {
            font-size: 40px;
            margin: 0;
            font-family: "Poppins", sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .logo {
            max-width: 350px;
            margin-top: 20px;
        }

        .profile-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            padding: 10px 0;
        }

        .profile-button {
            color: white;
        }

        .profile-images {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .profile-image {
            max-width: 30%;
            margin: 20px;
            text-align: center;
            position: relative;
        }

        .profile-image img {
            display: block;
            margin: 0 auto;
            max-width: 60%; /* Ajusta el tamaño de la imagen */
            height: auto; /* Ajusta la altura proporcionalmente */
        }

        .back-button {
            margin-top: 40px;
            text-align: center;
        }

        .green-divider {
            width: 100%;
            height: 100px;
            background-color: #00BF63;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divider-message {
            font-size: 18px;
            color: white;
        }

        .profile-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .logout-button {
            background-color: #00ff00;
            color: white;
        }

        .welcome-message {
            font-size: 24px;
            color: #00BF63;
            margin-top: 10px;
            text-align: center;
        }
       
    .welcome-message {
        animation: moveMessage 3s linear infinite;
    }

    @keyframes moveMessage {
        0% { transform: translateX(0); }
        50% { transform: translateX(50px); }
        100% { transform: translateX(0); }
    }

    </style>
</head>
<body>
<div class="container">
    <!-- Muestra el nombre de usuario si está conectado -->
    <?php
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo '<p class="welcome-message">¡Bienvenido , ' . $username . '!</p>' ;
    }
    ?> 

    
      <div class="logo-container">
        <img src="imagenes/pastilleroVirtualrecortado.jpeg" alt="Logo" />
        <a href="logout.php"class="btn waves-effect waves-light green logout-button" style="float: right;" >Cerrar Sesión</a>
        
        </div><div class="button-container"></div>

    
    <div class="container">
    </div>

    <div class="profile-buttons">
        <a href="2-mision.html" class="btn profile-button">Misión</a>
        <a href="3-vision.html" class="btn profile-button">Visión</a>
        <a href="4-contacto.html" class="btn profile-button">Contacto</a>
        <a href="5-ayuda.html" class="btn profile-button">Ayuda</a>
        <a href="6-blog.html" class="btn profile-button">Blog</a>
    </div>

    <div class="green-divider">
        <div class="divider-message" style="font-size: 30px;">"¿Cómo usarás la app? Perfil: Paciente o Cuidador"</div>
    </div>
    <br><br>

    <h4>Perfil</h4>
    
    <div class="profile-images">
    <div class="profile-buttons">
    <div class="button-container"> <!-- Cambiado a columna -->
    <div class="row">
        <div class="col s12 m6">
            <a href="actualizar_datos.php" class="btn waves-effect waves-light blue-grey">Actualizar Datos</a>
            <br><br>
            <a href="configuraciones.php" class="btn waves-effect waves-light grey">Configuraciones</a>
        </div></div>
        <div class="profile-image">
            <img src="imagenes/paciente2.png" alt="Paciente" />
            <a href="10-perfilpaciente.html" class="btn waves-effect waves-light">Paciente</a>
        </div>
        <div class="profile-image">
            <img src="imagenes/cuidador2.png" alt="Cuidador" />
            <a href="12-perfilcuidador.html" class="btn waves-effect waves-light">Cuidador</a>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
