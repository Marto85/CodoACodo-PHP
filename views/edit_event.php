<?php
include '../models/db_config.php';

// Verifica si se proporciona un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $eventoId = $_GET['id'];

    // Consulta para obtener los detalles del evento
    $sql = "SELECT * FROM eventos WHERE id = $eventoId";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $evento = $resultado->fetch_assoc();
        $titulo = $evento['titulo'];
        $fecha = $evento['fecha'];
        $lugar = $evento['lugar'];
        $categoria = $evento['categoria'];
        $descripcion = $evento['descripcion'];
        $imagen = $evento['path_imagen'];
        $importancia = $evento['destacado'] ? 'destacado' : ($evento['imperdible'] ? 'imperdible' : 'ninguno');
    } else {
        // Redirige si no se encuentra el evento
        header("Location: admin_panel.php");
        exit();
    }
} else {
    // Redirige si no se proporciona un ID válido
    header("Location: admin_panel.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/edit_event.css" rel="stylesheet">
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
    <div class="container">
        <div class="section-title">
            <h3 class="text-center">Editar Evento</h3>
        </div>
        <div class="event-form">
            <form action="../controllers/edit_event.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="evento_id" value="<?php echo $eventoId; ?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>" required>
                    <label for="lugar" class="form-label">Lugar</label>
                    <input type="text" name="lugar" class="form-control" value="<?php echo $lugar; ?>" required>
                    <div class="mb-3">
                        <label for="path_imagen" class="form-label">Imagen Actual</label>
                        <img src="<?php echo $imagen; ?>" alt="Imagen actual" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="mb-3">
                        <label for="nueva_imagen" class="form-label">Nueva Imagen (opcional)</label>
                        <input type="file" name="nueva_imagen" class="form-control">
                    </div>
                    <div class="mb-3">
                        <select name="categoria" class="form-select" required>
                            <option value="" disabled selected>Categoría</option>
                            <option value="musica" <?php echo ($categoria === 'musica') ? 'selected' : ''; ?>>Música</option>
                            <option value="teatro" <?php echo ($categoria === 'teatro') ? 'selected' : ''; ?>>Teatro</option>
                            <option value="deportes" <?php echo ($categoria === 'deportes') ? 'selected' : ''; ?>>Deportes</option>
                            <option value="conferencias" <?php echo ($categoria === 'conferencias') ? 'selected' : ''; ?>>Conferencias</option>
                            <option value="otros" <?php echo ($categoria === 'otros') ? 'selected' : ''; ?>>Otros</option>
                        </select>
                        <div class="mb-3">
                            <select name="importancia" class="form-select" required>
                                <option value="" disabled selected>Importancia</option>
                                <option value="ninguno" <?php echo ($importancia === 'ninguno') ? 'selected' : ''; ?>>Ninguno</option>
                                <option value="destacado" <?php echo ($importancia === 'destacado') ? 'selected' : ''; ?>>Destacado</option>
                                <option value="imperdible" <?php echo ($importancia === 'imperdible') ? 'selected' : ''; ?>>Imperdible</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            <a href="admin_panel.php" class="btn btn-secondary">Cancelar</a>
                        </div>
            </form>
        </div>
    </div>


</body>
<?php
include '../views/partials/footer.php';
?>

</html>