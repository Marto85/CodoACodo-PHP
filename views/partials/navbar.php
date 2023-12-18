<?php
session_start();
?>
<nav class="navbar navbar-expand-lg bg-info fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="../public/imgs/logos/Logo-EventiaHD.jpg" alt="Logo" width="200" height="50" class="d-inline-block align-text-top img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfIUojqIbqBbLTTKqtgtqnenCIWJ-FbWiImk-CVVrPaeCwLoQ/viewform">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/about_us.php">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/faq.php">Preguntas Frecuentes</a>
                </li>
                <?php
                // Verificar si la cookie de usuario está presente
                if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
                    // Obtener el correo electrónico del usuario (suponiendo que esté almacenado en una variable $user_email)
                    // $user_email = obtener_email_del_usuario(); // Esta función debería obtener el correo electrónico del usuario logueado

                    // Verificar si el correo electrónico del usuario está almacenado en la variable de sesión
                    if (isset($_SESSION['user_email']) && !empty($_SESSION['user_email'])) {
                        // Verificar si el correo electrónico termina en "eventia.com"
                        if (strpos($_SESSION['user_email'], '@eventia.com') !== false) {
                            // Mostrar un elemento adicional en el nav
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="../views/mailing_list.php">Lista de Suscriptores</a>';
                            echo '</li>';
                            echo '<li class="nav-item">';
                            echo '<a class="nav-link" href="../views/upload_events.php">Cargar Eventos</a>';
                            echo '</li>';
                        }
                    }
                }
                ?>
            </ul>
            <div class="dropdown">
                <?php
                // Verificar si la cookie de usuario está presente
                if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
                    // Usuario autenticado
                    echo '<i id="user-icon" class="user-icon fa-regular fa-user fa-lg" data-bs-toggle="dropdown" style="color: #282e29"></i>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="../views/user_profile.php">Mi Perfil</a></li>';
                    echo '<li>';
                    echo '<form action="../../controllers/logout.php" method="post">';
                    echo '<button type="submit" class="dropdown-item" style="border: none; background: none; cursor: pointer;">Salir</button>';
                    echo '</form>';
                    echo '</li>';
                    echo '</ul>';
                } else {
                    // Usuario no autenticado
                    echo '<i id="user-icon" class="user-icon fa-regular fa-user fa-lg" data-bs-toggle="dropdown" style="color: #282e29"></i>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="../../views/login.php">Ingresar</a></li>';
                    echo '<li><a class="dropdown-item" href="../../views/register.php">Registrarse</a></li>';
                    echo '</ul>';
                }
                ?>
            </div>

            <form class="d-flex search" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar evento" aria-label="Search">
                <i class="bi bi-search"></i>
            </form>
        </div>
    </div>
</nav>