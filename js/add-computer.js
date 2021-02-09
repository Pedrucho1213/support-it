document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formlaptop").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const person = document.getElementById('personal').value;
    const tipo = document.getElementById('tipo').value;
    if (person == 0) {
        alertify.error('Seleccionar un operador');
        return;
    }

    if (tipo == 0) {
        alertify.error('Seleccionar un tipo de disco duro');
        return;
    }
    this.submit();
}