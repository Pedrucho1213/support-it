const home = document.getElementById('homepage');
const addDepartamento = document.getElementById('add-departamento');
const viewDepartamento = document.getElementById('view-departamento');
const addPersonal = document.getElementById('add-personal');
const viewPersonal = document.getElementById('view-personal');
const addComputer = document.getElementById('add-computer');
const viewComputer = document.getElementById('view-computer');
const addEvento = document.getElementById('add-event');
const contenedorPrincipal = document.getElementById('cargarContenido');


(function () {
    homePage();
})();

home.addEventListener('click', function () {
    homePage();
})

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



function validarFormularioBusqueda() {
    document.getElementById('eventSearch').addEventListener('submit', function (evento){
        evento.preventDefault();
        const input = document.getElementById('inputsearch').value;

        if (input.length === 0) {
            alertify.error('Imposible realizar una busqueda con el campo vacio');
            return;
        }

        const xhr = new XMLHttpRequest();
        const search = document.getElementById('eventSearch');
        const formData = new FormData(search);

        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                contenedorPrincipal.innerHTML = e.target.response;
                xhr.abort();
            }
        })
        xhr.open('POST', './show-search.php', true);
        xhr.send(formData);
    });

}

function homePage() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            validarFormularioBusqueda();

            xhr.abort();
        }
    }
    xhr.open("get", "./home.php");
    xhr.send();
}

function addDepa() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            saveDepa();
            xhr.abort();
        }
    }
    xhr.open("get", "./add-departamento.html");
    xhr.send();
}

function viewDepa() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            xhr.abort();
        }
    }
    xhr.open("get", "./view-departamento.php");
    xhr.send();
}

function addPerson() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            savePerson();
            xhr.abort();
        }
    }
    xhr.open("get", "./add-personal.php",);
    xhr.send();

}

function viewPerson() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            xhr.abort();
        }
    }
    xhr.open('GET', './view-personal.php')
    xhr.send();
}

function addComput() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            saveComputer();
            xhr.abort();
        }
    }
    xhr.open('GET', './add-computer.php');
    xhr.send();
}

function showComputer() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            xhr.abort();
        }
    }
    xhr.open('GET', './view-computers.php');
    xhr.send();
}

function addEvent() {
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.status === 200 && xhr.readyState === 4) {
            contenedorPrincipal.innerHTML = xhr.responseText;
            saveEvent();
            xhr.abort();
        }
    }
    xhr.open('GET', './add-evento.php');
    xhr.send();
}


function saveDepa() {
    const xhr = new XMLHttpRequest();
    document.getElementById('save-departamento').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const formaddDepa = document.getElementById('save-departamento');
        const formData = new FormData(formaddDepa);
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.alert('Agregar departamento', 'Registro completado exitosamente');
                    addDepa();
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/add-departamento.php', true);
        xhr.send(formData);
    })
}

function editDepa(data) {
    const xhr = new XMLHttpRequest();

    alertify.prompt('Editar registro', "Ingrese el departamento correcto", '',
        function (evt, value) {
            const formData = new FormData();
            formData.append('cve', data);
            formData.append('nuevodepa', value);
            xhr.addEventListener('load', e => {
                if (e.target.readyState === 4 && e.target.status === 200) {
                    if (e.target.response === 'ok') {
                        alertify.success('Cambios realizados correctaente');
                        viewDepa();
                    }
                }
            })
            xhr.open('POST', '../bd/edit-departamento.php', true);
            xhr.send(formData);
        },
        function () {
            alertify.error('Cancelar');
        });


}

function deleteDepa(idData) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append('iddepa', idData);
    alertify.confirm('Confirme la operación', "¿ Seguro que desea borrar el registro ?",
        function () {
            xhr.addEventListener('load', e => {
                if (e.target.readyState === 4 && e.target.status === 200) {
                    if (e.target.response === 'ok') {
                        alertify.success('Proceso completado existosamente');
                        viewDepa();
                        xhr.abort();
                    }
                }
            })
            xhr.open('POST', '../bd/borrar-departamento.php', true);
            xhr.send(formData);

        },
        function () {
            alertify.error('Proceso cancelado');
            viewDepa();
            xhr.abort();
        });

}


function savePerson() {
    document.getElementById('formperson').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const nuevodepa = document.getElementById('departaento').value;
        if (nuevodepa === 0) {
            alertify.error('Seleccionar un departamento');
            return;
        }
        const xhr = new XMLHttpRequest();
        const formSavePerson = document.getElementById('formperson');
        const formData = new FormData(formSavePerson);

        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.alert('Agregar departamento', 'Registro completado exitosamente');
                    addPerson();
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/add-personal.php', true);
        xhr.send(formData);


    })
}

function editperson(data) {
    d = data.split('||');
    document.getElementById('idpersonal2').value = d[0];
    document.getElementById('nombres').value = d[1];
    document.getElementById('apellidos').value = d[2];
    document.getElementById('curp').value = d[3];
    document.getElementById('telefono').value = d[4];
    document.getElementById('correo').value = d[5];
    document.getElementById('departaento').value = d[6];

    document.getElementById('formpersonEdit').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const newDepa = document.getElementById('departaento').value;

        if (newDepa === 0) {
            alertify.error('Seleccionar un departamento');
            return;
        }
        const xhr = new XMLHttpRequest();
        const modal = document.getElementById('cerrarModal');
        const FormEditPerson = document.getElementById('formpersonEdit');
        const formData = new FormData(FormEditPerson);
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.success('Cambios realizados correctaente');
                    modal.click();
                }
            }
        })
        xhr.open('POST', '../bd/edit-personal.php', true);
        xhr.send(formData);
    })
}

function deletePerson(data) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append('idpersonal', data);
    alertify.confirm('Confirmación', '¿ Está seguro que desea borrar el registro ?', function () {
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.success('Proceso completado exitosamente');
                    viewPerson();
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/borrar-personal.php', true);
        xhr.send(formData);
    }, function () {
        alertify.error('Proceso cancelado');
        xhr.abort();
    });
}


function saveComputer() {
    const xhr = new XMLHttpRequest();
    document.getElementById('formlaptop').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const person = document.getElementById('personal').value;
        const tipo = document.getElementById('tipo').value;
        if (person == 0) {
            alertify.error('Seleccionar un operador');
            return;
        }
        if (tipo == 0) {
            alertify.error('Seleccionar un tipo de disco');
            return;
        }
        const formLaptop = document.getElementById('formlaptop');
        const formData = new FormData(formLaptop);
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.alert('Agregar computadora', 'Registro completado exitosamente');
                    addComput();
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/add-computer.php', true);
        xhr.send(formData);
    })
}

function editLaptop(data) {
    d = data.split('||');
    document.getElementById('personal2').value = d[9];
    document.getElementById('marca').value = d[1];
    document.getElementById('serie').value = d[2];
    document.getElementById('ram').value = d[3];
    document.getElementById('disco').value = d[4];
    document.getElementById('tipo').value = d[5];
    document.getElementById('cve_laptop2').value = d[0];

    document.getElementById('formupdateLaptop').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const person = document.getElementById('personal2').value;
        const tipo = document.getElementById('tipo').value;
        if (person == 0) {
            alertify.error('Seleccionar un operador');
            return;
        }
        if (tipo == 0) {
            alertify.error('Seleccionar un tipo de disco duro');
            return;
        }
        const xhr = new XMLHttpRequest();
        const modalClose = document.getElementById('CloseModal');
        const formEditLaptop = document.getElementById('formupdateLaptop');
        const formData = new FormData(formEditLaptop);
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.success('Cambios realizados correctamente');
                    modalClose.click();
                    showComputer();
                }
            }
        })
        xhr.open('POST', '../bd/edit-computers.php', true);
        xhr.send(formData);
    })
}

function deleteLaptop(data) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append('idlaptop', data);
    alertify.confirm('Confirmación', '¿ Está seguro que desea borrar el registro ?', function () {
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response === 'ok') {
                    alertify.success('Proceso completado exitosamente');
                    showComputer();
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/borrar-compuater.php', true);
        xhr.send(formData);
    }, function () {
        alertify.error('Proceso cancelador');
        xhr.abort();
    });
}


function saveEvent() {
    const xhr = new XMLHttpRequest();
    document.getElementById('eventoForm2').addEventListener('submit', function (evento) {
        evento.preventDefault();
        const laptop = document.getElementById('laptop').value;
        if (laptop == 0) {
            alertify.error('Seleccionar un ordenador');
            return;
        }
        const formularioEvento = document.getElementById('eventoForm2');
        const formData = new FormData(formularioEvento);
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                if (e.target.response) {
                    alertify.alert('Agregar evento', 'Registro completado exitosamente');
                    xhr.abort();
                }
            }
        })
        xhr.open('POST', '../bd/add-evento.php', true);
        xhr.send(formData);
    })
}

function detailsEvent(data) {
    const xhr = new XMLHttpRequest();
    const formData = new FormData();
    formData.append('id', data);
    xhr.addEventListener('load', e => {
        if (e.target.readyState === 4 && e.target.status === 200) {
            contenedorPrincipal.innerHTML = e.target.response;
            xhr.abort();
        }
    })
    xhr.open('POST', './details-event.php', true);
    xhr.send(formData);
}

function cerrarSesion() {
    const xhr = new XMLHttpRequest();
    alertify.confirm('Cerrar sesión', '¿ Está seguro que desea cerrar sesión ?', function () {
        xhr.addEventListener('load', e => {
            if (e.target.readyState === 4 && e.target.status === 200) {
                document.location.href = '../index.html';

            }
        })
        xhr.open('GET', '../bd/cerrar-sesion.php', true);
        xhr.send();
    }, function () {
        alertify.error('Proceso cancelado');
    });
}
