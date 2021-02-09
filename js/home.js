document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formsearch").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const input = document.getElementById('inputsearch').value;
    
    if (input.length == 0) {
        alertify.error('Imposible realizar una busqueda con el campo vacio');
        return;
    }
    this.submit();
}