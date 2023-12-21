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

function previewImage(input) {
    var preview = document.getElementById('imagen_previa');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        // Si no hay nueva imagen, restablece la vista previa
        preview.src = '<?php echo $imagen; ?>';
        preview.style.display = 'block';
    }
}

document.getElementById('path_imagen').addEventListener('change', function () {
    previewImage(this);
});

function resetForm() {
    // Limpiar la vista previa de la imagen
    document.getElementById('imagen_previa').src = '';
    document.getElementById('imagen_previa').style.display = 'none';

    // Restablecer el formulario
    document.getElementById('uploadForm').reset();
}



