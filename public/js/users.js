function previewImage() {
    var input = document.getElementById('imagen_perfil');
    var previewImage = document.getElementById('preview-image');
    var previewContainer = document.getElementById('preview-container');

    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            previewImage.src = e.target.result;
            previewImage.style.display = 'block';
            previewContainer.style.border = '1px solid #ccc'; // Opcional: Añadir un borde al contenedor de vista previa
        };
        reader.readAsDataURL(file);
    }
}