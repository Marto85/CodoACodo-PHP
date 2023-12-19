function validateForm() {
    var categoria = document.forms[0]["categoria"].value;
    var importancia = document.forms[0]["importancia"].value;
    if (categoria === "" || importancia === "") {
        alert("Debe seleccionar una categoría e importancia");
        return false;
    }
}

function date() {
    flatpickr("#fecha", {
        dateFormat: 'd-m-Y',
        locale: {
            buttonText: {
                today: 'Hoy'
            },
            months: {
                shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                longhand: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
            },
            weekdays: {
                shorthand: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
            }
        }
    });
}

