<?php
include '../models/db_config.php';
// Verificar si la cookie de usuario está presente
if(isset($_COOKIE["user_id"])) {
    $user_id = $_COOKIE["user_id"];

    // Buscar los datos del usuario en la base de datos
    $stmt = $conn->prepare("SELECT nombre, apellido, email, calle, altura, localidad, partido, provincia, telefono, imagen_perfil FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nombre, $apellido, $email, $calle, $altura, $localidad, $partido, $provincia, $telefono, $imagen_perfil);
        $stmt->fetch();
    } else {
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../public/css/index.css" rel="stylesheet">
    <link href="../public/css/register.css" rel="stylesheet">
    <link href="../public/css/user_profile.css" rel="stylesheet">
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


    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img src="<?php echo $imagen_perfil; ?>" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <i class="far fa-image"></i>
                    </button>
                </div>
                <button type="button" class="boton-portada">
                    <i class="far fa-image"></i> Cambiar fondo
                </button>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $nombre . " " . $apellido; ?></h3>
                <p class="texto">Aqui tal vez podria incluir mas adelante una descripcion que el usuario quiera hacer de si mismo</p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-signs"></i> Domicilio: <?php echo $calle . " " . $altura; ?></li>
                    <li><i class="icono fas fa-phone-alt"></i> Telefono: <?php echo $telefono; ?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fas fa-map-marker-alt"></i> Localidad/Pcia: <?php echo $localidad . ", " . $partido . ", " . $provincia; ?></li>
                    <li><i class="icono fas fa-calendar-alt"></i> Fecha nacimiento (aun no incluida en db).</li>
                </ul>
            </div>
            <div class="redes-sociales">
                <a href="#" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
                <a href="#" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
            </div>
        </div>
    </section>
</body>

</html>