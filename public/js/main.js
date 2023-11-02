document.addEventListener('DOMContentLoaded', function () {
    // obtengo los elementos que corresponden a los tipos de entradas disponibles
    var selectableCards = document.querySelectorAll('.selectable-card');


    selectableCards.forEach(function (card) {
        card.addEventListener('click', function () {
            // Verifico si el elemento sobre el que se hace clic ya tiene el color de fondo que deseo que tenga al clickear. Uso RGB porque por algun motivo con hexadecimal no me funcionaba
            var isSelected = card.style.backgroundColor === '#E10165' || card.style.backgroundColor === 'rgb(225, 1, 101)';
            if (!isSelected) {
                // Se reestablece siempre valores por defecto para evitar que puedan estar seleccionados 2 al mismo tiempo
                selectableCards.forEach(function (c) {
                    c.style.backgroundColor = '#5F5F5F';
                    c.style.color = 'white';
                });

                // Se cambia el color de fondo y de la letra al elemento seleccionado
                card.style.backgroundColor = '#E10165';
                card.style.color = 'white';
            } else {
                // Se reestablece el fondo y el color de texto del elemento si no estaba seleccioado
                card.style.backgroundColor = '#5F5F5F';
                card.style.color = 'white';
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var selectableCards = document.querySelectorAll('.selectable-card');
    var ticketsQuantity = document.querySelector('.tickets-quantity');
    var categoryDiscount = document.querySelector('.category-discount');
    var finalPrice = document.getElementById('price-final');
    

   // Objeto literal para setear el precio base de cada tipo de entrada sin descuento ni costo de servicio
    var basePrices = {
        platea: 10000,
        palco: 8000,
        pulmann: 7000
    };

    // Objeto literal para establecer el descuento de cada categoría
    var discountRates = {
        estudiante: 0.5,
        jubilado: 0.8,   
        docente: 0.5    
    };

    // Función para calcular el precio final
    function calcularPrecioFinal() {
        var selectedTicket = '';
        selectableCards.forEach(function (card) {
            if (card.style.backgroundColor === 'rgb(225, 1, 101)' || card.style.backgroundColor === '#E10165') {
                selectedTicket = card.id;
            }
    
            var selectedQuantity = parseInt(ticketsQuantity.value);
            var ticketPrice = basePrices[selectedTicket] || 0;
            var selectedCategory = categoryDiscount.value;
            var ticketPriceWithoutServicesCost = ticketPrice * selectedQuantity; // Precio sin costo de servicio
    
            // Calcular el costo de servicio (10% por entrada)
            var servicesCost = ticketPriceWithoutServicesCost * 0.1;
    
            // Calcular el precio final sumándole el costo de servicio
            var discountedPrice = ticketPriceWithoutServicesCost + servicesCost;
    
            if (selectedCategory && discountRates[selectedCategory]) {
                discountedPrice *= (1 - discountRates[selectedCategory]);
            }
    
            if (isNaN(discountedPrice)) {
                finalPrice.value = '$ 0.00'; // Si el resultado es NaN, mostrar "$ 0.00"
            } else {
                // Agrego formato para separar por miles y mostrar 2 decimales (ESTO LO INVESTIGUE PORQUE DESCONOCIA COMO HACERLO)
                var formattedPrice = new Intl.NumberFormat('es-ES', {
                    style: 'currency',
                    currency: 'ARS',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(discountedPrice);
    
                finalPrice.value = formattedPrice;
            }
        }
)};
    
    // Agregar manejadores de eventos
    selectableCards.forEach(function (card) {
        card.addEventListener('click', function () {
            calcularPrecioFinal();
        });
    });

    ticketsQuantity.addEventListener('change', calcularPrecioFinal);
    categoryDiscount.addEventListener('change', calcularPrecioFinal);
});
