<?php
include('conexion.php');
session_start();
if (!isset($_SESSION['username'])) {
    // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header('Location: 1-index.php');
    exit();   
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Pastillero Virtual - Paciente</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    /* ... (otros estilos) ... */
    
    h2 {
      font-size: 70px;
      margin: 0;
      font-family: "Poppins", sans-serif;
    }
    
    .logo-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    
    .logo {
      max-width: 350px;
      margin-top: 20px;
    }
    
    .logout-button {
      background-color:#00BF63;
      color: white;
    }
    
    .profile-buttons {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      padding: 10px 0;
    }
    
    .profile-button {
      color: white;
      margin: 0 10px;
    }
    
    /* ... (otros estilos) ... */
    
    .green-divider {
      width: 100%;
      height: 100px;
      background-color: #00BF63;
      display: flex;
      align-items: center;
    }
    
    .divider-image {
      max-width: 100px;
      height: auto;
      margin-left: 20px; /* Ajusta el margen izquierdo de la imagen */
    }
    
    .divider-message {
      font-size: 24px;
      color: white;
      margin-left: 40px; /* Ajusta el margen izquierdo del mensaje */
    }
    
    .profile-category-buttons {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 20px;
      padding: 20px 0;
    }
    
    .profile-category-button {
      color: white;
      background-color: #00BF63;
      text-align: center;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 16px;
      flex: 1; /* Distribuye el espacio de manera uniforme */
      border-radius: 50%; /* Para hacer los botones ovalados */
      max-width: 180px; /* Ajusta el ancho máximo de los botones */
      overflow: hidden; /* Para que el contenido no se desborde */
    }
    
    .profile-button-image {
      max-width: 100px; /* Ajusta el tamaño máximo de la imagen */
      height: auto; /* Ajusta la altura proporcionalmente */
      margin-bottom: 10px; /* Agrega un margen inferior a la imagen */
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo-container">
      <img src="http://127.0.0.1:5500/imagenes/pastilleroVirtualrecortado.jpeg" alt="Logo" class="logo">
      <a href="logout.php" class="btn waves-effect waves-light green logout-button">Cerrar Sesión</a>
      <p style="color: #3CB371;" >Usuario: <?php echo $_SESSION['username']; ?></p>
    </div>
    
    <div class="profile-buttons">
      <a href="http://127.0.0.1:5500/html/2-mision.html" class="btn profile-button">Misión</a>
      <a href="http://127.0.0.1:5500/html/3-vision.html" class="btn profile-button">Visión</a>
      <a href="http://127.0.0.1:5500/html/4-contacto.html" class="btn profile-button">Contacto</a>
      <a href="http://127.0.0.1:5500/html/5-ayuda.html" class="btn profile-button">Ayuda</a>
      <a href="http://127.0.0.1:5500/html/6-blog.html" class="btn profile-button">Blog</a>
    </div>
    
    <div class="green-divider">
      <img src="http://127.0.0.1:5500/imagenes/paciente2.png" alt="Imagen en franja verde" class="divider-image">
      <div class="divider-message">"Hola <?php echo $_SESSION['username']; ?> Tu asistente pastillero virtual está
        listo para ayudarte. 
        Mantén un control eficiente de tus tratamientos y cuidados aquí."</div>
    </div><br><br>
    <h2>Categoría</h2>
    
    <div class="profile-category-buttons">
      
    <a href="13-medicamento.php" class="profile-category-button">
        <img src="http://127.0.0.1:5500/imagenes/medicine_4745342.png" alt="Imagen 2" class="profile-button-image">
        <span>Medicamento</span>
      </a>
      <a href="17-registrarcita.php" class="profile-category-button">
        <img src="http://127.0.0.1:5500/imagenes/calendar_2278049.png" alt="Imagen 1" class="profile-button-image">
        <span>Cita</span>
      </a>
      
      <a href="http://127.0.0.1:5500/html/18-registrodieta.html" class="profile-category-button">
        <img src="http://127.0.0.1:5500/imagenes/healthy_10184079.png" alt="Imagen 3" class="profile-button-image">
        <span>Dieta</span>
      </a>
      <a href="#" class="profile-category-button" onclick="M.toast({html: 'esta en construcción'})">
        <img src="http://127.0.0.1:5500/imagenes/list.png" alt="Imagen 3" class="profile-button-image">
        <span>Recordatorios</span>
      </a>
      
    </div><br><br>
    <div class="back-button center-align">
      <a href="http:\\localhost\PASTI\php/9-bienvenida.php" class="btn waves-effect waves-light green logout-button">Atrás</a>
    </div><br><br>
  </div>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
