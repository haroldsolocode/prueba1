<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Nuevo Medicamento</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style>
    /* Estilos para centrar el contenido en la página */
    h2 {
      font-size: 70px;
      margin: 0;
      font-family: "Poppins", sans-serif;
    }
    body { 
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0; /* Color de fondo de la página */
    }
    
    /* Ajusta el contenedor principal */
    .registration-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 80%;
      max-width: 1200px;
      padding: 20px;
    }
    
    /* Ajusta el ancho del formulario */
    .registration-form {
      width: 60%;
    }
    
    /* Ajusta los márgenes internos del formulario */
    .registration-form .input-field {
      margin-bottom: 20px;
    }
    .registration-image {
      width: 30%;
      max-height: 400px;
      object-fit: cover;
      border-radius: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>

  <div class="registration-container"><br>
    <div class="registration-form"><br>      <br>
      <h2>Registrar Nuevo Medicamento</h2>
      <form id="medicationForm" action="registrar_medicamento.php" method="POST"  onsubmit= "return validarFechaVencimiento()"> <!-- Apunta a registrar_medicamento.php y usa el método POST -->
        <div class="input-field">
          <label for="medicamento">Nombre del Medicamento</label>
          <input type="text" id="medicamento" name="medicamento" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
        </div>
        <div class="input-field">
          <label for="dosificacion">Dosificación</label>
          <input type="text" id="dosificacion" name="dosificacion" required>
        </div>
        <div class="input-field">
          <label for="indicaciones">&nbsp;&nbsp;Descripción</label>
          <textarea id="indicaciones" name="descripcion" rows="4" required ></textarea>
        </div>
        <div class="input-field">
          <label for="via-administracion">Vía de Administración</label>
          <input type="text" id="via-administracion" name="via-administracion" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
        </div>
        <div class="input-field">
          <label for="presentacion">Presentación</label>
          <input type="text" id="presentacion" name="presentacion" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+" required>
        </div>
        <div class="input-field">
          <label for="cantidad">Cantidad/Stock</label>
          <input type="number" id="cantidad" name="cantidad"   required>
        </div>
        <div class="input-field">
          <label for="vencimiento">Fecha de Vencimiento</label><br>
          <input type="date" id="vencimiento" name="vencimiento" required>
          
        </div>
        <div class="input-field">
          <label for="contraindicacion">&nbsp;&nbsp;Contraindicaciones</label>
          <textarea id="contraindicacion" name="contraindicacion" rows="4" required></textarea>
        </div>
        
        <div class="row center-align button-space">
        <button class="waves-effect waves-light btn green" >Registrar</button>
        </div>
      </form>

    </div>
    <img src="http://127.0.0.1:5500/imagenes/medicine_4745342.png" alt="Imagen de Medicamento" class="registration-image">
  </div>
  <script>
    function validarFechaVencimiento() {
      var fechaVencimiento = document.getElementById('vencimiento').value;
      var fechaActual = new Date().toISOString().split('T')[0];

      if (fechaVencimiento < fechaActual) {
        alert('OJO: Medicamento Vencido.');
        return false;
      }

      return true;
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>
 
