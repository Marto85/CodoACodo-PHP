<?php
session_start();

// Verifica si se ha realizado con éxito la operación en mailing.php
if (isset($_SESSION['registroExitoso']) && $_SESSION['registroExitoso']) {
    // Muestra el modal con un delay de 3 segundos
    echo '<script>
            setTimeout(function() {
                $("#graciasModal").modal("show");
            }, 500);
          </script>';

    // Limpia la variable de sesión después de usarla
    unset($_SESSION['registroExitoso']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./public/css/index.css" rel="stylesheet">
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
    include './views/partials/navbar.php';
    ?>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="public/imgs/carousel/Carousel1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/imgs/carousel/Carousel2.webp" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="public/imgs/carousel/Carousel3.webp" class="d-block w-100" alt=" ...">
            </div>
            <div class="carousel-item">
                <img src="public/imgs/carousel/Carousel4.webp" class="d-block w-100" alt=" ...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="events-content">
        <div>
            <h1 class="highlights">Destacados</h1>
            <hr class="line-title">
        </div>
        <div class="container">
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card eq w-75 h-50">
                        <img src="public/imgs/cards/Card7.webp" class="card-img-top img-fluid img-cover" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center px-3 py-3">UNA PAREJA REAL</h3>
                            <div class="row px-3">
                                <div class="content-date col col-4">
                                    VIE
                                    <div class="day">15</div>
                                    DIC 2023
                                </div>
                                <div class="col col-8">
                                    <div class="title-place pb-2">Teatro Gran Rex</div> <a href="./views/purchase.php" class=""><button class="btn-buy-event py-2 px-3 text-center">comprar
                                            entradas</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card w-75 h-50">
                        <img src="public/imgs/cards/Card1.jpg" class="card-img-top img-fluid img-cover" alt="...">
                        <div class="card-body">
                            <h3 class="card-title text-center px-3 py-3">SONIC Y LAS 7 ESMERALDAS</h3>
                            <div class="row px-3">
                                <div class="content-date col col-4">
                                    SAB
                                    <div class="day">7</div>
                                    OCT 2023
                                </div>
                                <div class="col col-8">
                                    <div class="title-place pb-2">Sociedad Italiana San Fernando</div> <a href="./views/purchase.php" class=""><button class="btn-buy-event py-2 px-3 text-center">comprar
                                            entradas</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card w-75 h-50">
                        <img src="public/imgs/cards/Card5.webp" class="card-img-top img-fluid img-cover" alt=" ...">
                        <div class="card-body">
                            <h3 class="card-title text-center px-3 py-3">Q-LOKURA</h3>
                            <div class="row px-3">
                                <div class="content-date col col-4">
                                    SAB
                                    <div class="day">16</div>
                                    DIC 2023
                                </div>
                                <div class="col col-8">
                                    <div class="title-place pb-2">Arena Stadium</div> <a href="./views/purchase.php" class=""><button class="btn-buy-event py-2 px-3 text-center">comprar
                                            entradas</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h1 class="highlights">Imperdibles</h1>
            <hr class="line-title">
        </div>
        <div class="row justify-center main-events">
            <div class="col-6">
                <div class="container main-img d-flex">
                    <img src="public/imgs/main/Main-1.webp" class="img-fluid me-2" alt="...">
                    <img src="public/imgs/main/Main-2.webp" class="img-fluid ms-2" alt="...">
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <hr class="line-contact">
            <h3 class="newsletter-title text-center">Si no quieres perderte nada, déjanos tu correo electrónico y te
                mantendremos
                al tanto. Todo pasa en Eventia.</h3>
        </div>

        <?php
        include './views/partials/mailing_form.php';
        ?>
        <div class="modal fade" id="graciasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¡Gracias por suscribirte!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Vas a recibir las últimas novedades próximamente.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary"><a href="../views/mailing_list.php">Usuarios registrados</a></button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    include './views/partials/footer.php';
    ?>
<script src="../public/js/users.js"></script>
</body>

</html>