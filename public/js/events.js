function validateForm() {
    var categoria = document.forms[0]["categoria"].value;
    var importancia = document.forms[0]["importancia"].value;
    if (categoria === "" || importancia === "") {
        alert("Debe seleccionar una categoría e importancia");
        return false;
    }
}