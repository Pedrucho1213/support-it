<?php
    session_start();

    if (isset($_SESSION['user'])) {
        
    }else {
        echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>' ;  
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/add-computer.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="../alertify/css/alertify.min.css"/>
    <title>Document</title>
</head>

<body>
<header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Support IT</a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Departamentos
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add-departamento.html">Registrar
                                        departamento</a></li>
                                <li><a class="dropdown-item" href="view-departamento.php">Modificar
                                        departamento</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Personal
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add-personal.php">Registrar personal</a></li>
                                <li><a class="dropdown-item" href="view-personal.php">Modificar personal</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Computadoras
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="add-computer.php">Registrar computadora</a>
                                </li>
                                <li><a class="dropdown-item" href="view-computers.php">Modificar computadora</a>
                                </li>
                            </ul>
                        </li>
                    <li class="nav-item">
                         <a class="nav-link " aria-current="page" href="./add-evento.php">Registrara evento</a>
                    </li>
                    </ul>
                    <button class="btn btn-outline-danger" onclick="window.location.href='../bd/cerrar-sesion.php'" type="button">Cerrar sesión</button>
                </div>
            </div>
        </nav>
    </header>
    
    <main class="flex-shrink-0">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar computadoras</li>
            </ol>
        </nav>
            <h1 class="mt-5">
                Registrar computadoras
            </h1>
            <div class="py-5 container">
                <p>Aqui usted podra registrar todas las computadoras que existen dentro de la organización empresarial.
                </p>
            </div>
            <div class="container">
            <form action="../bd/add-computer.php" method="POST" id="formlaptop" enctype="multipart/form-data">

                    <select class="form-select" aria-label="Default select example" id="personal" name="personal">
                        <option selected value="0">Primero seleccione operador al que pertenece el ordenador</option>
                        <?php
                             require_once "../bd/conexion.php";
                             $sql = "SELECT p.cve_persona, p.nombre, p.apellido, d.nombre from personal as p, departamento as d WHERE p.cve_departamento = d.cve_departamento";
                             $result = mysqli_query($conexion,$sql);
                             while ($ver = mysqli_fetch_row($result)){
                        ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?> <?php echo $ver[2] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ver[3] ?> </option>
                        <?php } ?>
                    </select>
                    <div class="row py-5">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="marca" name="marca" placeholder="name@example.com" required>
                                <label for="marca">Marca y modelo del Ordenador / PC</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="serie" name="serie" placeholder="name@example.com" required>
                                <label for="serie">Numero de serie</label>
                            </div>
                        </div>
                        <div class="row  gx-3 align-items-center">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="ram" name="ram" placeholder="name@example.com" required>
                                    <label for="ram">Memoria RAM (GB)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="disco" name="disco" placeholder="name@example.com" required>
                                    <label for="disco">Disco duro (GB)</label>
                                </div>
                            </div>
                            <div class="col-auto ">
                                <select class="form-select " aria-label="Default select example" name="tipo" id="tipo">
                                    <option selected value="0">Tipo disco duro</option>
                                    <option value="1">SSD</option>
                                    <option value="2">HDD</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 form-control-lg py-5">
                            <label for="formFile" class="form-label">Capturar fotografia frontal del equipo</label>
                            <input class="form-control" type="file" id="formFile" name="formFile">
                        </div>
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-outline-success" type="submit">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
<script src="../boostrap/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="../js/add-computer.js"></script>

</html>