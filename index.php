`<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/index.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&family=Roboto:wght@300;700&family=Rubik:wght@400;600&family=Young+Serif&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Eventia</title>
</head>

<body>
    <?php
    include './views/navbar.php';
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
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-8">
                    <form>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <input type="text" class="form-control" id="name" placeholder="Escribe tu nombre">
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <input type="text" class="form-control" id="lastName" placeholder="Escribe tu apellido">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Escribe tu email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-logo col-md-4">
                    <img src="public/imgs/logos/Logo-EventiaHD.png" alt="Logo al costado del formulario" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <?php
    include './views/footer.php';
    ?>

</body>

</html>`