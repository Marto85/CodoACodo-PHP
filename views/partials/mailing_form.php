<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <form action="../controllers/mailing.php" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-3">
                        <input type="text" class="form-control" id="name" name="nombre" placeholder="Escribe tu nombre">
                    </div>
                    <div class="col-md-6 col-sm-12 mb-3">
                        <input type="text" class="form-control" id="lastName" name="apellido" placeholder="Escribe tu apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Escribe tu email">
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


