<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/register.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Roboto:wght@300;700&family=Rubik:wght@400;600&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c4ac9449c7.js" crossorigin="anonymous"></script>
    <title>Eventia</title>
</head>

<body>
    <?php
    include './partials/navbar.php';
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="logo-container logo text-center">
                    <img src="../public/imgs/logos/Favicon.svg" alt="Logo" class="img-fluid">
                </div>
                <h1 class="text-center mt-4 mb-4">Registro de Usuarios</h1>

                <form  action="../controllers/register.php" method="POST">
                    <div class="mb-3">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2 mb-md-0" id="nombre" name="nombre" placeholder="Nombre" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2 mb-md-0" id="calle" name="calle" placeholder="Calle" required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="altura" name="altura" placeholder="Altura" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2 mb-md-0" id="localidad" name="localidad" placeholder="Localidad" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="partido" name="partido" placeholder="Partido" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <input type="telephone" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-2 mb-md-0" id="password" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="confirm-password" name="confirm-password" placeholder="Repetir Contraseña" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary mt-3">Registrarse</button>
                        <button type="submit" class="btn btn-primary mt-3">Ya tengo cuenta</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 d-none d-lg-block img-col">
                <img src="../public/imgs/register.jpg" alt="Imagen" class="full-width-height">
            </div>
        </div>
    </div>

    <?php
    include './partials/footer.php';
    ?>
</body>

</html>