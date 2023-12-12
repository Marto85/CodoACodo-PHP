document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById("imagen_perfil");
    const previewContainer = document.getElementById("preview-container");

    // Vincular el evento de cambio en el input de tipo archivo al contenedor de vista previa
    imageInput.addEventListener("change", function () {
        const selectedFile = imageInput.files[0];

        if (selectedFile) {
            const imageUrl = URL.createObjectURL(selectedFile);
            previewContainer.style.backgroundImage = `url(${imageUrl})`;
        } else {
            // Restaurar la imagen por defecto si no se selecciona ninguna imagen
            previewContainer.style.backgroundImage = 'url("../imgs/profiles/default.jpg")';
        }
    });

    // Vincular el evento de clic en el contenedor de vista previa al input de tipo archivo
    previewContainer.addEventListener("click", function () {
        imageInput.click();
    });
});