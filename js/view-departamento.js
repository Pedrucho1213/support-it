(function () {
    var form = document.getElementById('deleteDepa');
    form.addEventListener('submit', function (event) {
        // si es false entonces que no haga el submit
        if (!confirm('Realmente desea eliminar?')) {
            event.preventDefault();
        }
    }, false);
})();

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("editdepa").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const nuevodepa = document.getElementById('nuevodata').value;
    
    if (nuevodepa.length == 0) {
        alertify.error('No se admite campos vacios');
        return;
    }
    this.submit();
}