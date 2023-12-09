<?php
include '../models/db_config.php';
?>

<?php
// Consulta para obtener todos los registros de la tabla 
$sql = "SELECT * FROM lista_correo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/mailing_list.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Roboto:wght@300;700&family=Rubik:wght@400;600&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->
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
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['apellido'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";

                            // Botón Editar y Guardar
                            echo "<td>";
                            echo "<button type='button' class='btn btn-warning btn-editar' data-id='$id'>Editar</button>";
                            echo "<button type='button' class='btn btn-success btn-guardar guardar-btn' data-id='$id' style='display: none;'>Guardar</button>";
                            echo "</td>";
                            echo "<td><button type='button' class='btn btn-danger btn-eliminar' data-id='" . $row['id'] . "' onclick='confirmarEliminar(this)'>Eliminar</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay registros en la tabla</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>

    <?php
    include 'partials/footer.php';
    ?>
</body>