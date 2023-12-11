<?php
session_start(); // Inicia la sesión si no está iniciada
include '../models/db_config.php';

// Consulta para obtener todos los registros de la tabla 
$sql = "SELECT * FROM lista_correo";
$result = $conn->query($sql);

// Verifica si se ha completado una eliminación exitosa
if (isset($_SESSION['eliminacionExitosa']) && $_SESSION['eliminacionExitosa'] === true) {
    echo "<script>$('#eliminacionExitosaModal').modal('show');</script>";
    unset($_SESSION['eliminacionExitosa']); // Limpia la variable de sesión después de mostrar el modal
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <!-- <link href="./public/css/register.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Roboto:wght@300;700&family=Rubik:wght@400;600&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c4ac9449c7.js" crossorigin="anonymous"></script>
    <title>Eventia</title>
</head>
<header>
    <?php
    include 'partials/navbar.php';
    ?>
</header>

<body>
    <div class="container-fluid">
        <section>
            <h2 class="text-center">Nuestros suscriptores</h2>
        </section>
    </div>
    <div class="container-fluid">
        <section>
            <table class="table table-bordered text-center table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            echo "<tr>";
                            echo "<td><input type='text' value='" . $row['nombre'] . "' class='form-control nombre' disabled></td>";
                            echo "<td><input type='text' value='" . $row['apellido'] . "' class='form-control apellido' disabled></td>";
                            echo "<td><input type='text' value='" . $row['email'] . "' class='form-control email' disabled></td>";
                            echo "<td class='align-middle'>";
                            echo "   <div class='d-flex justify-content-center'>";
                            echo "       <button type='button' id= 'edit-btn' class='btn btn-warning btn-editar btn-m btn-block' data-id='$id'>Actualizar</button>";
                            echo "       <button type='button' class='btn btn-success btn-guardar btn-m btn-block' data-id='$id' style='display: none;'>Guardar</button>";
                            echo "   </div>";
                            echo "</td>";
                            echo "<td class='align-middle'><div class='d-flex justify-content-center'><button type='button' class='btn btn-danger btn-eliminar btn-m btn-block' data-id='$id' onclick='confirmarEliminar(this)'>Eliminar</button></div></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay registros en la tabla</td></tr>";
                    }
                    ?>
                </tbody>


            </table>

            <!-- Modal de Confirmación de Eliminación -->
            <div class="modal" id="confirmarEliminarModal" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ¿Estás seguro de que deseas eliminar este registro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" id="eliminarBtn" data-id="" onclick="abrirFormularioEliminar()">Eliminar</button>
                            <form id="eliminarForm" method="post" action="../controllers/mailing.php">
                                <input type="hidden" name="eliminarId" id="eliminarId" value="">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    include 'partials/footer.php';
    ?>

    <script src="../public/js/mailing.js"></script>
    <script src="../public/js/users.js"></script>
</body>


</html>