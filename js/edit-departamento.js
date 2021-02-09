(function () {
    var form = document.getElementById('editdepa');
    form.addEventListener('submit', function (event) {
        // si es false entonces que no haga el submit
        if (!confirm('Realmente desea eliminar?')) {
            event.preventDefault();
        }
    }, false);
})();