const addDepartamento = document.getElementById('add-departamento');
const viewDepartamento = document.getElementById('view-departamento');
const addPersonal = document.getElementById('add-personal');
const viewPersonal = document.getElementById('view-personal');
const addComputer = document.getElementById('add-computer');
const viewComputer = document.getElementById('view-computer');
const addEvento = document.getElementById('add-event');
const contenedorPrincipal = document.getElementById('cargarContenido');
const xhr = new XMLHttpRequest();

(function () {
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
        }
    }
    xhr.open("get", "./home.php");
    xhr.send();
})();


addDepartamento.addEventListener('click', function () {
    addDepa();
})

viewDepartamento.addEventListener('click', function () {
    viewDepa();
})

addPersonal.addEventListener('click', function () {
    addPerson();
})

viewPersonal.addEventListener('click', function () {
    viewPerson();
})

addComputer.addEventListener('click', function () {
    addComput();
})

viewComputer.addEventListener('click', function () {
    showComputer();
})

addEvento.addEventListener('click', function () {
    addEvent();
})

window.addEventListener('load', function (){
    document.getElementById('eventSearch').addEventListener('submit', validarFormularioBusqueda);
})




function addDepa() {
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
        }
    }
    xhr.open("get", "./add-departamento.html");
    xhr.send();
}

function viewDepa() {
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            deleteDepa();
        }
    }
    xhr.open("get", "./view-departamento.php");
    xhr.send();
}

function addPerson() {
    const contenedor = document.getElementById('cargarContenido');
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200) {
            contenedor.innerHTML = xhr.responseText;
        }
    }
    xhr.open("get", "./add-Personal.php", true);
    xhr.send();
}

function viewPerson() {

}

function addComput() {

}

function showComputer() {

}

function addEvent() {

}

function validarFormularioBusqueda(evento) {
    evento.preventDefault();
    const input = document.getElementById('inputsearch').value;

    if (input.length === 0) {
        alertify.error('Imposible realizar una busqueda con el campo vacio');
        return;
    }
    this.submit();
}

function deleteDepa () {
    document.getElementById('deleteDepa').addEventListener('submit', function (evento){
        evento.preventDefault();
        const formDeleteDepa = document.getElementById('deleteDepa');
        const formData = new FormData(formDeleteDepa);
        xhr.open('POST', '../bd/borrar-departamento.php', true);
        alertify.confirm('Confirme la operación',"¿ Seguro que desea borrar el registro ?",
            function(){
            xhr.addEventListener('load', e=> {
                if (e.target.readyState === 4 && e.target.status === 200){
                    if (e.target.response === 'ok'){
                        alertify.success('Proceso completado existosamente');
                        viewDepa();
                    }
                }
            })
                xhr.send(formData);
            },
            function(){
                alertify.error('Proceso cancelado');
            });
    })
}

function saveDepa (){

}