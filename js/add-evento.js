document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("eventoForm").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const laptop = document.getElementById('laptop').value;
    if (laptop == 0) {
        alertify.error('Seleccionar un ordenador');
        return;
    }
    this.submit();
}