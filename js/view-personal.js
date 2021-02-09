(function () {
    var form = document.getElementById('formpersonal');
    form.addEventListener('submit', function (event) {
        // si es false entonces que no haga el submit
        if (!confirm('Realmente desea eliminar?')) {
            event.preventDefault();
        }
    }, false);
})();

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formperson").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const nuevodepa = document.getElementById('departaento').value;
    
    if (nuevodepa == 0) {
        alertify.error('Seleccionar un departamento');
        return;
    }
    this.submit();
}