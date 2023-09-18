document.addEventListener("DOMContentLoaded", function() {
    var empleadoNumeroInput = document.getElementById("empleadoNumero");
    var mensajeError = document.getElementById("mensajeError");

    empleadoNumeroInput.addEventListener("input", function() {
        var valor = empleadoNumeroInput.value;
        if (!/^\d+$/.test(valor)) {
            mensajeError.textContent = "Solo se permiten números.";
            empleadoNumeroInput.value = ""; // Limpia el valor ingresado
        } else {
            mensajeError.textContent = "";
        }
    });
});