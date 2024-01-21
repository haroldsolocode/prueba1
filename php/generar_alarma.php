<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Alarma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background-image: url('ruta_de_la_imagen/reloj.jpg'); /* Cambia 'ruta_de_la_imagen' por la ruta real */
            background-size: cover;
            background-position: center;
            color: white;
        }

        .container {
            background: rgba(0, 0, 0, 0.7); /* Fondo semi-transparente */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .input-field label {
            color: white;
        }

        .input-field input,
        .input-field select {
            color: white;
            border-bottom: 1px solid white;
        }

        .input-field input:focus,
        .input-field select:focus {
            border-bottom: 1px solid teal;
            box-shadow: 0 1px 0 0 teal;
        }
    </style>
</head>

<body class="container">

    <h2 class="teal-text text-accent-3 center-align">Configurar Alarma</h2>

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

    // Obtener el id_medicamento de la URL
    $id_medicamento = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificar si el id_medicamento es válido
    if ($id_medicamento !== null) {
        // Puedes realizar acciones con el id_medicamento, por ejemplo, guardarlo en una variable
        $id_medicamento_para_usar = $id_medicamento;

        // Luego, puedes usar $id_medicamento_para_usar según tus necesidades
    } else {
        // Manejar el caso en el que no se proporcionó el id_medicamento
        echo "No se proporcionó un id_medicamento válido.";
    }

    ?>

    <form action="procesar_alarma.php" method="post" class="col s12" onsubmit="return validarFormulario()">
        <div class="input-field">
            <label for="mensaje">Mensaje de Alarma:</label>
            <input type="text" id="mensaje" name="mensaje" class="validate" required>
        </div>

        <div class="input-field">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" class="validate" required>
        </div>

        <div class="input-field">
            <label for="whatsapp">Número de WhatsApp:</label>
            <input type="text" id="whatsapp" name="whatsapp" class="validate" required>
        </div>

        <div class="input-field">
            <label for="fecha">Fecha del Recordatorio:</label> <br>
            <input type="date" id="fecha" name="fecha_recordatorio" class="validate" required min="<?= date('Y-m-d') ?>">
        </div>

        <div class="input-field">
            <label for="hora">Hora del Recordatorio:</label>
            <input type="time" id="hora" name="hora_recordatorio" class="validate" required>
        </div>

        <div class="input-field">
            <label>Frecuencia de Repetición:</label><br>
            <p>
                <label>
                    <input type="checkbox" id="diario" name="diario" onclick="seleccionarTodosLosDias(this)" />
                    <span>Diario</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="lunes" name="dias[]" value="lunes" />
                    <span>Lunes</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="martes" name="dias[]" value="martes" />
                    <span>Martes</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="miercoles" name="dias[]" value="miercoles" />
                    <span>Miércoles</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="jueves" name="dias[]" value="jueves" />
                    <span>Jueves</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="viernes" name="dias[]" value="viernes" />
                    <span>Viernes</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="sabado" name="dias[]" value="sabado" />
                    <span>Sábado</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="checkbox" id="domingo" name="dias[]" value="domingo" />
                    <span>Domingo</span>
                </label>
            </p>
        </div>

        <div class="input-field">
            <label for="tipo_sonido" class= "black-text">Tipo de Sonido:</label>
            <select name="tipo_sonido" id="tipo_sonido" class="browser-default" >
                <option value="sonido1">Sonido 1</option>
                <option value="sonido2">Sonido 2</option>
                <option value="sonido3">Sonido 3</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
        </div>

        <!-- Resto del formulario -->

        <input type="hidden" name="id_medicamento" value="<?= $id_medicamento ?>">

        <button class="btn waves-effect waves-light" type="submit">Guardar Alarma</button>
    </form>

    <?php
    $conexion->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            M.updateTextFields(); // Actualiza los campos de Materialize al cargar la página
        });

        function seleccionarTodosLosDias(checkbox) {
            var checkboxes = document.getElementsByName('dias[]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = checkbox.checked;
            }
        }

        function validarFormulario() {
            var mensaje = document.getElementById("mensaje").value;
            var correo = document.getElementById("correo").value;
            var whatsapp = document.getElementById("whatsapp").value;
            var fecha = document.getElementById("fecha").value;
            var hora = document.getElementById("hora").value;

            if (mensaje === "" || correo === "" || whatsapp === "" || fecha === "" || hora === "") {
                alert("Por favor, complete todos los campos.");
                return false;
            }

            var fechaActual = new Date();
            var fechaRecordatorio = new Date(fecha + " " + hora);

            if (fechaRecordatorio <= fechaActual) {
                alert("La fecha del recordatorio debe ser posterior a la fecha actual.");
                return false;
            }

            // Puedes agregar más validaciones según tus necesidades

            return true;
        }
    </script>
</body>

</html>
