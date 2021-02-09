(function () {
    var form = document.getElementById('formlaptop');
    form.addEventListener('submit', function (event) {
        // si es false entonces que no haga el submit
        if (!confirm('Realmente desea eliminar?')) {
            event.preventDefault();
        }
    }, false);
})();

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formupdateLaptop").addEventListener("submit", validarFormulario);
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

