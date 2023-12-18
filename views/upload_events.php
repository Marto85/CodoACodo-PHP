<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/upload_events.css" rel="stylesheet">
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
    <div class="form-container container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3>Cargar evento nuevo</h3>
                <form action="../controllers/upload_events.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="mb-3">
                        <input type="date" name="fecha" class="form-control" placeholder="Fecha" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="lugar" class="form-control" placeholder="Lugar" required>
                    </div>
                    <div class="mb-3">
                        <select name="categoria" class="form-select form-control" required>
                            <option value="" disabled selected>Categoría</option>
                            <option value="teatro">Teatro</option>
                            <option value="infantiles">Infantiles</option>
                            <option value="recital">Recital</option>
                            <option value="festival">Festival</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <textarea name="descripcion" class="form-control" placeholder="Descripción" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="file" name="path_imagen" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <select name="importancia" id="importancia" class="form-select form-control" required>
                            <option value="" disabled selected>Importancia</option>
                            <option value="ninguno">Ninguno</option>
                            <option value="destacado">Destacado</option>
                            <option value="imperdible">Imperdible</option>
                        </select>
                    </div>
                    <div class="mb-3 d-flex justify-content-around">
                        <button type="reset" class="btn btn-secondary square-btn">Restablecer</button>
                        <button type="submit" class="btn btn-primary">Crear evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include '../views/partials/footer.php';
    ?>
    <script src="../public/js/users.js"></script>
    <script>
        src = "..public/js/events.js"
    </script>
</body>

</html>