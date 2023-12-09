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