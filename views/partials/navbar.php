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
                    <a class="nav-link active" aria-current="page" href="../views/mailing_list.php">Buscar Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quienes somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../views/mailing_list.php">Lista de suscriptores</a>
                </li>
            </ul>
            <div class="dropdown">
                <?php
                // Verificar si la cookie de usuario está presente
                if (isset($_COOKIE['user_id']) && !empty($_COOKIE['user_id'])) {
                    // Usuario autenticado
                    echo '<i id="user-icon" class="user-icon fa-regular fa-user fa-lg" data-bs-toggle="dropdown" style="color: #282e29"></i>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a class="dropdown-item" href="#">Mi Perfil</a></li>';
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
                    echo '<li><a class="dropdown-item" href="#">Ingresar</a></li>';
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