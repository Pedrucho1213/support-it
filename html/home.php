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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="../alertify/css/alertify.min.css"/>
    <link href="/css/home.css" rel="stylesheet">
    <title>Inicio</title>
</head>

<body class="d-flex flex-column">
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
                    <form class="d-flex" action="show-search.php" method="POST" id="formsearch">
                        <input class="form-control me-2" type="search" placeholder="Buscar evento"aria-label="Search" name="inputsearch" id="inputsearch" >
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                    <button class="btn btn-outline-danger" onclick="window.location.href='../bd/cerrar-sesion.php'" type="button">Cerrar sesión</button>
                </div>
            </div>
        </nav>
        
    </header>

    <main class="flex-shrink-0">
        
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
            <h1 class="mt-5">
                Eventos programados
            </h1>
            <div class="container">
                <div class="album py-5 bg-light">
                    <div class="container">
                        <!-- Galeria de tarjetas -->
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <!-- Componentes de cards -->
                            <?php
                                require_once "../bd/conexion.php";
                                $sql = "SELECT
                                e.cve_evento,
                                e.nombre,
                                l.marca,
                                l.serie,
                                l.fotografia,
                                d.nombre,
                                TIMESTAMPDIFF(DAY, CURDATE(), e.fecha ) AS dias_transcurridos
                            FROM
                                evento AS e,
                                departamento AS d,
                                laptop AS l,
                                personal AS p
                            WHERE
                                e.cve_laptop = l.cve_laptop AND l.cve_operador = p.cve_persona AND d.cve_departamento = p.cve_departamento";
                                $result = mysqli_query($conexion,$sql);
                                while ($ver = mysqli_fetch_row($result)){
                            ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" role="img"
                                        src="../img/<?php echo $ver[4] ?>" preserveAspectRatio="xMidYMid slice"
                                        focusable="false">
                                    <rect width="100%" height="100%" fill="#55595c" />
                                    </img>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $ver[1] ?></h5>
                                        <p class="card-text">
                                        <?php echo $ver[2] ?> <?php echo $ver[3] ?>
                                            <br>
                                            <?php echo $ver[5] ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form action="details-event.php" method="POST">
                                                    <input type="text" hidden="" name="id" value="<?php echo $ver[0] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-primary">Detalles</button>
                                                </form>
                                            </div>
                                            <small class="text-muted">Dentro de <?php echo $ver[6] ?> días</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>
<script src="/boostrap/js/bootstrap.min.js"></script>
<script src="../js/home.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</html>