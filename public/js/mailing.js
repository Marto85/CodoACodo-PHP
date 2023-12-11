function confirmarEliminar(btn) {
    // Recupero el valor del atributo 'data-id' del botón clickeado
    var id = btn.getAttribute('data-id');

    // Actualiza el data-id del botón dentro del modal
    document.getElementById('eliminarBtn').setAttribute('data-id', id);

    // Muestro modal usando boostrap
    var modal = new bootstrap.Modal(document.getElementById('confirmarEliminarModal'));

    modal.show();
}

function abrirFormularioEliminar() {
    var id = document.getElementById('eliminarBtn').getAttribute('data-id');
    document.getElementById('eliminarId').value = id;

    document.getElementById('eliminarForm').submit();
}

document.addEventListener('DOMContentLoaded', function () {
    // Event listener para los botones "Editar"
    document.querySelectorAll('.btn-editar').forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Oculta el botón "Editar" y muestra el botón "Guardar"
            btn.style.display = 'none';
            var id = btn.getAttribute('data-id');
            var btnGuardar = document.querySelector('.btn-guardar[data-id="' + id + '"]');
            btnGuardar.style.display = 'inline-block';

            // Habilita la edición de los campos de texto
            var fila = btn.closest('tr');
            fila.querySelectorAll('input').forEach(function (input) {
                input.removeAttribute('disabled');
            });
        });
    });

    // Event listener para los botones "Guardar"
    document.querySelectorAll('.btn-guardar').forEach(function (btnGuardar) {
        btnGuardar.addEventListener('click', function () {
            // Oculta el botón "Guardar" y muestra el botón "Editar"
            btnGuardar.style.display = 'none';
            var id = btnGuardar.getAttribute('data-id');
            var btnEditar = document.querySelector('.btn-editar[data-id="' + id + '"]');
            btnEditar.style.display = 'inline-block';

            // Deshabilita la edición de los campos de texto
            var fila = btnGuardar.closest('tr');
            fila.querySelectorAll('input').forEach(function (input) {
                input.setAttribute('disabled', 'disabled');
            });

            // Obtiene los valores editados y los envía al servidor
            var nombre = fila.querySelector('.nombre').value;
            var apellido = fila.querySelector('.apellido').value;
            var email = fila.querySelector('.email').value;
            enviarEdicion(id, nombre, apellido, email);
        });
    });

    // Función para enviar la edición al servidor
    async function enviarEdicion(id, nombre, apellido, email) {
        console.log('Enviando datos de edición al servidor:', id, nombre, apellido, email);

        // Crea un objeto FormData y agrega los datos
        var formData = new FormData();
        formData.append('id', id);
        formData.append('nombre', nombre);
        formData.append('apellido', apellido);
        formData.append('email', email);

        try {
            // Realiza una solicitud AJAX para enviar los datos al servidor
            const response = await fetch('../controllers/mailing.php', {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                const data = await response.json();
                if ('success' in data && data.success === true) {
                    // Refresca la página después de la actualización
                    window.location.reload();
                } else {
                    console.error('Error al actualizar el registro:', data.message);
                }
            } else {
                console.error('Error en la solicitud:', response.status);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
});
