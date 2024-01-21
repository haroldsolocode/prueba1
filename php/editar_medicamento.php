<?php
// Verifica si se ha enviado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_medicamento = $_GET['id'];

    // Conecta a la base de datos (asegúrate de configurar la conexión)
    include('conexion.php');

    // Realiza una consulta para obtener los datos del medicamento a editar
    $query = "SELECT * FROM medicamentos WHERE id_medicamento = $id_medicamento";
    $resultado = $conexion->query($query);

    // Verifica si se encontró el medicamento
    if ($resultado->num_rows == 1) {
        $medicamento = $resultado->fetch_assoc();
    } else {
        // Si no se encontró el medicamento, puedes manejar el error o redirigir a otra página
        echo "El medicamento no existe.";
        exit;
    }
} else {
    // Si no se proporcionó un ID válido en la URL, puedes manejar el error o redirigir a otra página
    echo "ID no válido.";
    exit;
}

// Procesa el formulario de edición si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos enviados desde el formulario
    $nuevo_nombre = $_POST['nombre'];
    $nueva_dosificacion = $_POST['dosificacion'];
    $nueva_descripcion = $_POST['descripcion'];
    $nueva_via_administracion = $_POST['via_administracion'];
    $nueva_presentacion = $_POST['presentacion'];
    $nueva_cantidad = $_POST['cantidad'];
    $nuevo_vencimiento = $_POST['vencimiento'];
    $nueva_contraindicacion = $_POST['contraindicacion'];

    // Realiza la actualización en la base de datos
    $query = "UPDATE medicamentos SET nombre = '$nuevo_nombre', dosificacion = '$nueva_dosificacion', descripcion = '$nueva_descripcion', via_administracion = '$nueva_via_administracion', presentacion = '$nueva_presentacion', cantidad = '$nueva_cantidad', fecha_vencimiento = '$nuevo_vencimiento', contraindicaciones = '$nueva_contraindicacion' WHERE id_medicamento = $id_medicamento";

    if ($conexion->query($query) === TRUE) {
        echo "Medicamento actualizado con éxito.";
        // Redirige a la página principal u otra página de tu elección
        header('location: registroMedicamentoCRUD.php');
        exit;
    } else {
        echo "Error al actualizar el medicamento: " . $conexion->error;
    }
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Medicamento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="col-8 p-4">
        <h4>Editar Medicamento</h4>
        <form action="editar_medicamento.php? id=<?= $id_medicamento ?>" method="POST">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $medicamento['nombre'] ?>">
            <input type="text" name="dosificacion" placeholder="Dosificación" value="<?= $medicamento['dosificacion'] ?>">
            <input type="text" name="descripcion" placeholder="descripcion" value="<?= $medicamento['descripcion'] ?>">
            <input type="text" name="via_administracion" placeholder="Vía de Administración" value="<?= $medicamento['via_administracion'] ?>">
            <input type="text" name="presentacion" placeholder="Presentación" value="<?= $medicamento['presentacion'] ?>">
            <input type="text" name="cantidad" placeholder="Cantidad" value="<?= $medicamento['cantidad'] ?>">
            <input type="text" name="vencimiento" placeholder="Fecha de Vencimiento" value="<?= $medicamento['fecha_vencimiento'] ?>">
            <input type="text" name="contraindicacion" placeholder="Contraindicaciones" value="<?= $medicamento['contraindicaciones'] ?>">
            <button type="submit" class="btn waves-effect waves-light blue">
                Actualizar
                <i class="material-icons right">edit</i>
            </button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
