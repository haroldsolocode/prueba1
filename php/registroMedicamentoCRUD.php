<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Medicamentos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f6;
        }

        .container {
            margin-top: 20px;
        }

        .table th,
        .table td {
            white-space: nowrap;
        }

        .table th {
            text-align: center;
        }

        .truncate-content {
            max-width: 200px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
        }

        .truncate-content.expanded {
            max-width: none;
            white-space: normal;
        }

        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="black-text text-accent-3 center-align">Medicamentos Registrados</h2>
        <table class="highlight responsive-table">
            <thead class="card-panel teal accent-3">
                <tr>
                    <th>Nombre</th>
                    <th>Dosificación</th>
                    <th>Descripción</th>
                    <th>Vía de Administración</th>
                    <th>Presentación</th>
                    <th>Cantidad</th>
                    <th>Vencimiento</th>
                    <th>Contraindicaciones</th>
                    <th>Añadir Recordatorio</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('conexion.php');
                $consulta = $conexion->query("SELECT * FROM medicamentos");

                while ($medicamento = $consulta->fetch_assoc()) {
                    $id_medicamento = $medicamento['id_medicamento'];
                ?>
                    <tr>
                        <td><?= $medicamento["nombre"] ?></td>
                        <td><?= $medicamento["dosificacion"] ?></td>
                        <td class="truncate-content" data-id="<?= $id_medicamento ?>">
                            <?= $medicamento["descripcion"] ?>
                        </td>
                        <td><?= $medicamento["via_administracion"] ?></td>
                        <td><?= $medicamento["presentacion"] ?></td>
                        <td><?= $medicamento["cantidad"] ?></td>
                        <td><?= $medicamento["fecha_vencimiento"] ?></td>
                        <td class="truncate-content" data-id="<?= $id_medicamento ?>"><?= $medicamento["contraindicaciones"] ?></td>
                        <td>
                            <a href="generar_alarma.php?id=<?= $id_medicamento ?>" class="btn-floating btn-small waves-effect waves-light orange">
                                <i class="material-icons">alarm</i>
                            </a>
                        </td>
                        <td>
                            <a href="editar_medicamento.php?id=<?= $medicamento['id_medicamento'] ?>" class="btn-floating btn-small waves-effect waves-light blue">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td>
                            <a href="eliminar_medicamento.php?id=<?= $medicamento['id_medicamento'] ?>" class="btn-floating btn-small waves-effect waves-light red" onclick="return confirm('¿Estás seguro de que deseas eliminar este medicamento?');">
                                <i class="material-icons">delete</i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const truncateCells = document.querySelectorAll('.truncate-content');

            truncateCells.forEach(cell => {
                cell.addEventListener('click', function () {
                    this.classList.toggle('expanded');
                });
            });
        });
    </script>
</body>

</html>
