(function () {
    var div = document.createElement('div');
    div.setAttribute('id', 'contenedor-carga');
    document.body.appendChild(div);
    var contenedor = document.getElementById("contenedor-carga");

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status == 200) {
            contenedor.innerHTML = xhr.responseText;
            cargarStyles();
        }
    }
    xhr.open("get", "./html/loader.html", true);
    xhr.send();
})();

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formLogin").addEventListener("submit", validarFormulario);
})

function cargarStyles() {
    var holder = document.getElementById("loader-holder");
    var loader = document.getElementById("loader");

    if (loader) {
        var sLoader = loader.style;
        holder.style.width = "100%";
        holder.style.height = "100%";
        holder.style.position = "absolute";
        holder.style.margin = "auto";
        holder.style.zIndex = "300";
        holder.style.top = "0";
        holder.style.display = "none";
        holder.style.background = "#00000080";

        sLoader.border = "16px solid #f3f3f3";
        sLoader.borderRadius = "50%";
        sLoader.borderTop = "16px solid #3498db";
        sLoader.width = "15vh";
        sLoader.height = "15vh";
        sLoader.zIndex = "301";
        sLoader.margin = "auto";
        sLoader.position = "absolute";
        sLoader.top = "27.9vh";
        sLoader.left = "43%";
        loader.animate([
            {transform: 'rotate(0deg)'},
             { transform:'rotate(360deg)' }
        ],{
            duration: 1000,
            iterations: Infinity
        });
    }
}

function validarFormulario(evento) {
    var holder = document.getElementById("loader-holder");
     

    evento.preventDefault();
    const usuario = document.getElementById('inputUser').value;
    const contraseña = document.getElementById('inputPassword').value;

    if (usuario.length == 0) {
        alertify.error('El usuario es obligatorio');
        return;
    }
    if (contraseña.length == 0) {
        alertify.error('La contraseña es obligatoria');
        return;
    }
    holder.style.display = "block";
    this.submit();
}