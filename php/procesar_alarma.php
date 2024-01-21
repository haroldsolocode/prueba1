<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $mensaje = $_POST['mensaje'];
    $correo = $_POST['correo'];
    $whatsapp = $_POST['whatsapp'];
    $fecha = $_POST['fecha_recordatorio'];
    $hora = $_POST['hora_recordatorio'];
    $dias = isset($_POST['dias']) ? implode(',', $_POST['dias']) : '';
    $sonido = $_POST['tipo_sonido'];
    $id_medicamento = $_POST['id_medicamento'];
    // Validar y procesar datos según tus necesidades

    // Por ejemplo, podrías almacenar la configuración de la alarma en la base de datos
    $query_insertar_alarma = "INSERT INTO alarmas (mensaje, correo, whatsapp, fecha_recordatorio, hora_recordatorio, dias, tipo_sonido, id_medicamento) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                             

    $stmt_insertar_alarma = $conexion->prepare($query_insertar_alarma);

    if ($stmt_insertar_alarma) {
        // Asociar parámetros
        $stmt_insertar_alarma->bind_param("ssssssss", $mensaje, $correo, $whatsapp, $fecha, $hora, $dias, $sonido,$id_medicamento);

        // Ejecutar la consulta
        if ($stmt_insertar_alarma->execute()) {
            // Si la inserción es exitosa, podrías mostrar un mensaje de éxito o redirigir a otra página
            // Agrega este bloque de código después de obtener $id_medicamento
           
            echo "<h1>Alarma configurada con éxito.</h1>";
            echo "<meta http-equiv='refresh' content='2; url=http://localhost/PASTI/php/registroMedicamentoCRUD.php'>";
        } else {
            // Si hay un error al configurar la alarma, mostrar un mensaje de error
            // Agrega este bloque de código después de obtener $id_medicamento
            
            echo "<h1>Error al configurar la alarma: " . $stmt_insertar_alarma->error . "</h1>";
            echo "<h1><a href='generar_alarma.php'>Volver a intentar</a></h1>";
        }

        // Cerrar el statement
        $stmt_insertar_alarma->close();
    } else {
        echo "<h1>Error en la preparación de la consulta: " . $conexion->error . "</h1>";
    }
}

$conexion->close();
?>


