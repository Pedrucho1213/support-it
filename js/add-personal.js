document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formperson").addEventListener("submit", validarFormulario);
})

function validarFormulario(evento) {
    evento.preventDefault();
    const nuevodepa = document.getElementById('departaento').value;
    
    if (nuevodepa === 0) {
        alertify.error('Seleccionar un departamento');
        return;
    }
    this.submit();
}