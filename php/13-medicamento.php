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
    <meta charset="UTF-8" />
    <title>Pastillero Virtual - cuidador</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
    />
    <style>
      /* ... (otros estilos css) ... */
      .medication-list {
        list-style-type: none;
        padding: 0;
      }

      .medication-list-item {
        margin: 10px 0;
        padding: 10px;
        background-color: #00bf63;
        color: white;
        border-radius: 8px;
      }

      h3 {
        font-size: 50px;
        margin: 0;
        font-family: "Poppins", sans-serif;
      }
      h4 {
        font-size: 30px;
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
        background-color: green;
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

      .green-divider {
        width: 100%;
        height: 100px;
        background-color: #00bf63;
        display: flex;
        align-items: center;
      }

      .divider-image {
        max-width: 100px;
        height: auto;
        margin-left: 20px;
      }

      .divider-message {
        font-size: 24px;
        color: white;
        margin-left: 40px;
      }

      .profile-category-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        margin-top: 20px;
        padding: 20px 0;
      }

      .profile-category-button {
        color: white;
        background-color: #00bf63;
        text-align: center;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 16px;
        border-radius: 8px;
        max-width: 180px;
        overflow: hidden;
      }

      .ingresar-medicamento {
        background-color:#40FF91;
        color: black;
      }

      .medicamentos-registrados {
        background-color: #00bf63;
        color: BLACK;
      }

      .profile-button-image {
        max-width: 80px;
        height: auto;
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="logo-container">
        <img
          src="http://127.0.0.1:5500/imagenes/pastilleroVirtualrecortado.jpeg"
          alt="Logo"
          class="logo"
        />
        <a
          href="logout.php"
          class="btn waves-effect waves-light green logout-button"
          >Cerrar Sesión</a
        >
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
        <img
          src="http://127.0.0.1:5500/imagenes/paciente2.png"
          alt="Imagen en franja verde"
          class="divider-image"
        />
        <div class="divider-message">
          ¡Llevar un registro de los medicamentos que debes tomar es más fácil
          que nunca!.
        </div>
      </div>
      <br /><br />
      <h3>Registra tus Medicamentos y Genera los Recordatorios</h3>
      <br /><br />

     

      <div class="profile-category-buttons">
        <a
          href="http:\\localhost\PASTI\php/15-registrarmedicamento.php"
          class="modal-trigger profile-category-button ingresar-medicamento"
        >
          <img
            src="http://127.0.0.1:5500/imagenes/agregar.png"
            alt="Imagen 4"
            class="profile-button-image"
          />
          <span>Ingresar Medicamento</span>
        </a>
        <a
          href="http:\\localhost\PASTI\php/registroMedicamentoCRUD.php"
          class="modal-trigger profile-category-button medicamentos-registrados"
        >
          <img
            src="http://127.0.0.1:5500/imagenes/listconalarma.png"
            alt="Imagen 4"
            class="profile-button-image"
          />
          <span> Medicamentos Registrados y Crear Alarma</span>
        </a>
      </div>

      <br /><br /><br />

      <div class="back-button center-align">
        <a
          href="http:\\localhost\PASTI\php/10-perfilpaciente.php"
          class="btn waves-effect waves-light green"
          >Atrás</a
        >
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
