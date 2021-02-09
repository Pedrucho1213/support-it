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
        holder.style.left = "0";
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
        sLoader.left = "44%";
        loader.animate([
            { transform: 'rotate(0deg)' },
            { transform: 'rotate(360deg)' }
        ], {
            duration: 1000,
            iterations: Infinity
        });
    }
}

function showLoader() {
    var holder = document.getElementById("loader-holder");
    holder.style.display = "block";
}

function hiddeLoader() {
    var holder = document.getElementById("loader-holder");
    holder.style.display = "none";
}

function validarFormulario(evento) {
    evento.preventDefault();
    const usuario = document.getElementById('inputUser').value;
    const contraseña = document.getElementById('inputPassword').value;

    if (usuario.length == 0) {
        alertify.warning('El usuario es obligatorio');
        return;
    }
    if (contraseña.length == 0) {
        alertify.warning('La contraseña es obligatoria');
        return;
    }

    showLoader();
    setTimeout(function () {
        enviarForm();
    }, 2000);
}

function enviarForm() {
    var form = document.getElementById('formLogin');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', './bd/login.php', true);
    var formData = new FormData(form);
    xhr.addEventListener('load', e => {
        if (e.target.readyState == 4 && e.target.status == 200) {
            if (e.target.response == 'ok') {
                alertify
                    .alert("Bienvenido", "Exito al inicio de sesión.", function () {
                        document.location.href = './html/home.php';
                    });
            } else {

                alertify.alert('Error', 'Asegurese de introducir correctamente sus credenciales');
                hiddeLoader();
            }
        }
    })
    xhr.send(formData);

}
