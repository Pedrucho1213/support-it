<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>' ; 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="../alertify/css/alertify.min.css"/>
    <link rel="stylesheet" href="../css/add-evento.css">
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
    <main class="flex-shirink-0">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Programar evento</li>
            </ol>
        </nav>
            <h1 class="mt-5">
                Programar evento
            </h1>
            <div class="coantainer-fluid px-5 py-5">
                <form action="../bd/add-evento.php" method="POST" id="eventoForm" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nameEvent" name="nameEvent" placeholder="name@example.com" required>
                        <label for="nameEvent">Nombre del evento</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="laptop" name="laptop" aria-label="Floating label select example">
                            <option selected value="0">Seleccionar ordenador</option>
                                <?php
                                    require_once "../bd/conexion.php";
                                    $sql = "SELECT
                                    l.cve_laptop,
                                    l.marca,
                                    l.serie,
                                    p.nombre,
                                    p.apellido,
                                    d.nombre
                                FROM
                                    laptop AS l,
                                    personal AS p,
                                    departamento AS d
                                WHERE
                                    l.cve_operador = p.cve_persona
                                AND p.cve_departamento = d.cve_departamento";
                            $result = mysqli_query($conexion,$sql);
                            while ($ver = mysqli_fetch_row($result)){

                                ?>
                            <option value="<?php echo $ver[0] ?>"><?php echo $ver[1] ?> <?php echo $ver[2] ?> -- <?php echo $ver[3] ?> <?php echo $ver[4] ?> -- <?php echo $ver[5] ?></option>
                            <?php } ?>
                        </select>
                        <label for="laptop">Seleccioné un ordenador previamente registrado</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" id="fechaEvento" name="fechaEvento" placeholder="name@example.com" min="<?php echo $hoy=date('Y-m-d')?>" required>
                        <label for="fechaEvento">Fecha del evento</label>
                    </div>
                    <div class="form-floating  mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="detalles" name="detalles" style="height: 100px" required></textarea>
                        <label for="detalles">Descripcción del evento</label>
                    </div>
                    <div class="mb-3">
                        <label for="foto1" class="form-label">Fotografia lateral izquierda</label>
                        <input class="form-control" type="file" id="foto1" name="foto1" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-outline-success" type="submit">Registrar</button>
                        </div>
                </form>
            </div>
        </div>
    </main>

</body>
<script src="../boostrap/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="../js/add-evento.js"></script>

</html>