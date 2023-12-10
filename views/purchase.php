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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/c4ac9449c7.js" crossorigin="anonymous"></script>
    <title>Eventia</title>
</head>

<body>
    <?php
    include '../views/partials/navbar.php';
    ?>

    <div class="detail-event">
        <div class="row py-4 justify-center content-container">
            <div class="col col-10">
                <div class="col col-12">
                    <h1 class="title-event py-5">
                        UNA PAREJA REAL
                    </h1>
                    <hr>
                </div>
                <div class="description col col-12">
                    <div class="row">
                        <div class="col-lg-6 col-12"><img src="./public/imgs/cards/Card3.webp" alt="Evento - UNA PAREJA REAL">
                        </div>
                        <div class="px-md-6 col-lg-6 col-12">
                            <div class="row content">
                                <div class="col-md-2 col-1">
                                    <div class="day content-date daytext-center">
                                        VIE <span class="day"> 15 </span> DIC 2023

                                        <span>8:30PM</span>
                                    </div>
                                </div>
                            </div>
                            <h1 class="item info mb-8">Información general</h1>
                            <div class="item"><img src="/public/imgs/icons/ic_event_place_tb.svg" alt="Lugar:">
                                <p class="ml-4 mr-1 mb-0"><span>Lugar:</span>
                                    Gran Rex
                                </p>
                            </div>
                            <div class="item"><img src="/public/imgs/icons/ic_event_place_tb.svg" alt="Ciudad:">
                                <p class="ml-4 mr-1 mb-0"><span>Ciudad:</span>
                                    CABA
                                </p>
                            </div>
                            <div class="item"><img src="/public/imgs/icons/ic_calendar.svg" alt="Fecha:">
                                <p class="ml-4 mr-1 mb-0"><span>Fecha:</span>
                                    15 de Diciembre
                                </p>
                            </div>
                            <div class="item"><img src="/public/imgs/icons/ic_event_time_tb.svg" alt="Hora:">
                                <p class="ml-4 mr-1 mb-0"><span>Hora:</span>
                                    8:30PM
                                </p>
                            </div>
                            <div class="item"><img src="/public/imgs/icons/ic_event_category_tb.svg" alt="Categoría:">
                                <p class="ml-4 mr-1 mb-0"><span>Categoría:</span>
                                    Teatro
                                </p>
                            </div>
                            <div class="item"><img src="/public/imgs/icons/ic_event_place_tb.svg" alt="Dirección:">
                                <p class="ml-4 mr-1 mb-0"><span>Dirección:</span>
                                    Av. Corrientes 857
                                </p>
                            </div>

                            <div class="mt-4">
                                <div class=" buy row align-center justify-center">
                                    <div class="px-2 text-center py-1 col col-12">
                                        <a href="#formulario"><button class="px-6 py-1 button-payment">Comprar</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="description-text pat-3 col col-12">
                            <h2>UNA PAREJA REAL</h2>
                            <h3>Viernes 15 de diciembre - 20:30 Hs<br>Teatro Gran Rex</h3>
                            <h3>&nbsp;</h3>
                            <p class="event-description">Cierre de la Exitosa Gira Internacional
                                Una Pareja Real es una comedia que plantea la lucha del día a día de un joven matrimonio
                                que sobrevive a los avatares de la vida y la crianza de sus hijos. Jose y Jero son los
                                protagonistas de esta divertida historia en la que nos hacen reír e identificarnos en
                                cada momento. <a href="/"><button class="px-6 py-1 button-payment">Comprar</button></a>
                                Un día Jose le recomienda a Jero seguir el exitoso canal de YouTube "La Pareja Ideal",
                                en el que Paul Rivera y Ellen Trum, una pareja de escritores que vive en Miami, dan
                                consejos para mejorar la convivencia y convertirse en el matrimonio perfecto.
                                Una sucesión de enredos, que combinan humor, amor, ironía y valores familiares, les
                                permite a los protagonistas darse cuenta de que la única pareja ideal es una pareja
                                real.
                                Jero Freixas y Jose de Cabo, los papás de Rita y Ramón, llegaron a los escenarios de la
                                mano de Una Pareja Real, luego de convertirse en un fenómeno viral en las redes sociales
                                como "La Pareja del Mundial" y más tarde como "La Pareja de la Copa América".
                                Hoy se presentan en Buenos Aires, como cierre de una exitosa gira internacional que
                                abarcó funciones en Costa Rica, Nicaragua, Guatemala, Panamá, México, Colombia, Perú,
                                Ecuador, Chile y en las ciudades europeas de Barcelona, Madrid y Valencia, en las que
                                reunieron más de 90.000 espectadores.
                                La obra es dirigida por Jero Freixas y Charlie Gerbaldo y cuenta con la producción
                                general de Nicolás Mastromarino.
                                La duración de esta divertida comedia es de 90 minutos.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 mb-4">
                    <div class="content-title col-md-6 col-12" id="formulario">
                        <h2>Ubicación y precios</h2>
                        <div class="line-title"></div>
                    </div>
                    <div class="col col-12">
                        <div class="row content-price">
                            <div class="col col-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-12">
                                        <div class="card-price v-card v-sheet theme--light selectable-card" id="platea">
                                            <div class="v-card__text px-0 py-0">
                                                <div class="header-price py-5 mb-6 text-center">
                                                    PLATEA
                                                </div>
                                                <div class="px-3 py-1 text-center">
                                                    <p class="price">
                                                        $10.000 + <span>$1000 *</span></p>
                                                    <div class="line-tickets"></div>
                                                    <div class="text-price py-4">Valor entrada</div>
                                                    <div class="pt-8 pb-1 number">$ 11.000</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-12">
                                        <div class="card-price v-card v-sheet theme--light selectable-card" id="palco">
                                            <div class="v-card__text px-0 py-0">
                                                <div class="header-price py-5 mb-6 text-center">
                                                    PALCO
                                                </div>
                                                <div class="px-3 py-1 text-center">
                                                    <p class="price">
                                                        $8000 + <span>$800 *</span></p>
                                                    <div class="line-tickets"></div>
                                                    <div class="text-price py-4">Valor entrada</div>
                                                    <div class="pt-8 pb-1 number">$ 8.800</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-12">
                                        <div class="card-price v-card v-sheet theme--light selectable-card" id="pulmann">
                                            <div class="v-card__text px-0 py-0">
                                                <div class="header-price py-5 mb-6 text-center">
                                                    PULMANN
                                                </div>
                                                <div class="px-3 py-1 text-center">
                                                    <p class="price">
                                                        $7000 + <span>$700 *</span></p>
                                                    <div class="line-tickets"></div>
                                                    <div class="text-price py-4">Valor entrada</div>
                                                    <div class="pt-8 pb-1 number">$ 7700</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="service-cost">* Costo del servicio: 10% del valor de cada entrada</span>
                                    <div class="form-container">
                                        <form>
                                            <div class="row my-3">
                                                <div class="col-sm-6 col-12 col-auto">
                                                    <div class="input-container">
                                                        <input type="text" class="form-control" placeholder="Nombre">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12 col-auto mt-3 mt-sm-0">
                                                    <div class="input-container">
                                                        <input type="text" class="form-control" placeholder="Apellido">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-sm-12 col-12 col-auto">
                                                    <div class="input-container">
                                                        <input type="email" class="form-control mail" placeholder="Correo Electrónico">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-sm-6 col-12 col-auto">
                                                    <div class="input-container">
                                                        <select class="form-control tickets-quantity">
                                                            <option hidden>Cantidad de entradas</option>
                                                            <option value="0">Ninguno</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12 col-auto mt-3 mt-sm-0">
                                                    <div class="input-container">
                                                        <select class="form-control category-discount">
                                                            <option value="" hidden>Descuentos</option>
                                                            <option value="estudiante">Estudiante</option>
                                                            <option value="jubilado">Jubilado/a</option>
                                                            <option value="docente">Docentes</option>
                                                            <option value="ninguno">Ninguno</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-sm-12 col-12 col-auto">
                                                    <div class="input-container">
                                                        <label for="price-final">Precio Final</label>
                                                        <input type="text" class="form-control" id="price-final" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-sm-12 col-12 col-auto">
                                                    <div class="input-container">
                                                        <button type="reset" class="btn btn-secondary">Resetear
                                                            Formulario</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="px-4 col col-12">
                        <div class="legal py-3 px-7">
                            <h4><strong>EVENTIA se toma muy en serio la problemática causada por la reventa de
                                    entradas.</strong></h4>
                            <p>Ud. debe cumplir con el límite en la cantidad de entradas que cada usuario puede comprar
                                para este evento. Si usted realiza cualquier tipo de maniobra para exceder el límite de
                                compra, EVENTIA puede a su discreción, cancelar cualquiera o todas las órdenes de
                                compra sin previo aviso. Esto incluye las órdenes de compra realizadas con distintos
                                nombres de usuario pero asociadas con el mismo nombre, dirección de email, dirección
                                postal personal, número de tarjeta de crédito o débito, etc.&nbsp;</p>
                            <p>Los datos del titular de la tarjeta deberán coincidir con los datos del usuario de la
                                cuenta de EVENTIA. Caso contrario, EVENTIA tiene derecho a cancelar la compra.</p>
                            <p>No adquiera entradas para este evento en sitios web de reventa de entradas tales como
                                Viagogo, MercadoLibre, Rowticket, Ticketgo, o similares. Las entradas ofrecidas para
                                reventa en tales sitios pueden ser falsas o, aunque fueran originales, podrían haber
                                sido perdidas, robadas, anuladas o canceladas. EVENTIA no tiene vínculo alguno con
                                esos sitios de reventa y no se responsabiliza por las entradas que seas adquiridas por
                                tales medios.</p>
                            <p>Durante el proceso de compra se le ofrecerá el Servicio de Protege EVENTIA que extiende
                                los Términos y Condiciones. Usted podrá optar por seleccionar no adquirir el
                                servicio.&nbsp;&nbsp;</p>
                            <p>EVENTIA percibe un "Cargo por Servicio" en contraprestación por el servicio brindado
                                por EVENTIA al cliente para acceder a la compra de entradas para eventos a través de
                                Internet. Previo al pago, podrá ver el Resumen de la compra con el detalle de la orden
                                de compra y el monto total de la compra. El cliente tiene la opción de comprar las
                                entradas en la boletería del teatro/sala/estadio sin pago de “cargo por servicio”.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
    include '../views/partials/footer.php';
    ?>
    <script src="/public/js/purchase.js"></script>
    <script src="/public/js/users.js"></script>
</body>

</html>