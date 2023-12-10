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

    var btnEditar = document.querySelectorAll('.btn-editar');
    btnEditar.forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Obtener la fila actual
            var row = btn.closest('tr');

            // Habilitar la edición de los campos
            row.querySelector('.nombre').disabled = false;
            row.querySelector('.apellido').disabled = false;
            row.querySelector('.email').disabled = false;

            // Alternar visibilidad de botones
            row.querySelector('.btn-editar').style.display = 'none';
            row.querySelector('.btn-guardar').style.display = 'block';
        });
    });

    var btnGuardar = document.querySelectorAll('.btn-guardar');
    btnGuardar.forEach(function (btn) {
        btn.addEventListener('click', function () {
            // Obtener la fila actual
            var row = btn.closest('tr');

            // Deshabilitar la edición de los campos
            row.querySelector('.nombre').disabled = true;
            row.querySelector('.apellido').disabled = true;
            row.querySelector('.email').disabled = true;

            // Alternar visibilidad de botones
            row.querySelector('.btn-editar').style.display = 'block';
            row.querySelector('.btn-guardar').style.display = 'none';

            // Obtener los nuevos valores
            var id = row.getAttribute('data-id');
            var nombre = row.querySelector('.nombre').value;
            var apellido = row.querySelector('.apellido').value;
            var email = row.querySelector('.email').value;

            // Enviar datos al servidor para la actualización
            actualizarRegistro(id, nombre, apellido, email);
        });
    });
});

async function actualizarRegistro(id, nombre, apellido, email) {
    try {
        const response = await fetch('../controllers/mailing.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `id=${id}&nombre=${nombre}&apellido=${apellido}&email=${email}&accion=actualizar`,
        });

        if (response.ok) {
            // Puedes agregar lógica adicional si es necesario
            console.log('Registro actualizado exitosamente');
        } else {
            console.error('Error al actualizar el registro:', response.statusText);
        }
    } catch (error) {
        console.error('Error al actualizar el registro:', error);
    }
}
