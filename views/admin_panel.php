<?php
include '../models/db_config.php';
// Consulta para obtener todos los registros de la tabla 
$sql = "SELECT * FROM eventos";
$eventos = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/admin_panel.css" rel="stylesheet">
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

<body>
    <?php
    include '../views/partials/navbar.php';
    ?>

    <div class="container grand">
        <div class="section-title">
            <h3>Administrar <span> Eventos</span></h3>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 gx-3">
            <?php
            foreach ($eventos as $evento) {
                $titulo = $evento['titulo'];
                $imagen = $evento['path_imagen'];
                $eventoId = $evento['id'];
            ?>
                <div class="card-container">
                    <div class="card h-100 w-100">
                        <img src="<?php echo $imagen; ?>" class="card-img-top" alt="<?php echo $titulo; ?>">
                        <div class="card-body">
                            <p class="card-text"><?php echo $titulo; ?></p>
                            <a href="vista_detalles.php?id=<?php echo $eventoId; ?>" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

<?php
include '../views/partials/footer.php';
?>

</html>