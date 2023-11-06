<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_REGISTRO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="col-8 p-4">
        <table class="table">
            <thead class="card-panel teal accent-3">
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>sexo</th>
                    <th>Correo</th>
                    <th>Movil</th>
                    <th>Username</th>
                    <th>Contraseña</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include('conexion.php');
                $ins = $conexion->query("SELECT * FROM usuarios");
                while ($datos = $ins->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $datos["id_registro"] ?></td>
                        <td><?= $datos["nombres"] ?></td>
                        <td><?= $datos["apellidos"] ?></td>
                        <td><?= $datos["fecha_nacimiento"] ?></td>
                        <td><?= $datos["nacionalidad"] ?></td>
                        <td><?= $datos["sexo"] ?></td>
                        <td><?= $datos["correo"] ?></td>
                        <td><?= $datos["movil"] ?></td>
                        <td><?= $datos["username"] ?></td>
                        <td><?= $datos["contrasena"] ?></td>
                        <td>

                        <a href="editar_registro.php? id=<?= $datos['id_registro'] ?>" 
                            class="btn-floating btn-small waves-effect waves-light blue"
                           >
                                <i class="material-icons">edit</i>
                            </a>
                            <a href="eliminar_registro.php? id=<?= $datos['id_registro'] ?>"
                             class="btn-floating btn-small waves-effect waves-light red"  
                             onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?');">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
