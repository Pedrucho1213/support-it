
<?php
session_start();

if (isset($_SESSION['user'])) {

} else {
    echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="../alertify/css/alertify.min.css"/>
    <link rel="stylesheet" href="../css/add-personal.css">
    <title>Support IT</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" id="homepage">Support IT</a>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Departamentos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" id="add-departamento">Registrar departamento</a></li>
                            <li><a class="dropdown-item" id="view-departamento">Modificar departamento</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Personal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" id="add-personal">Registrar personal</a></li>
                            <li><a class="dropdown-item" id="view-personal">Modificar personal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Computadoras</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" id="add-computer">Registrar computadora</a></li>
                            <li><a class="dropdown-item" id="view-computer">Modificar computadora</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" id="add-event">Registrar evento</a>
                    </li>
                </ul>
                <button class="btn btn-outline-danger" onclick="cerrarSesion()"
                        type="button">Cerrar sesión
                </button>
            </div>
        </div>
    </nav>
</header>

<main id="cargarContenido">

</main>

</body>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="../boostrap/js/bootstrap.min.js"></script>
<script src="../js/navbar.js"></script>
</html>