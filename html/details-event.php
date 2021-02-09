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

    <link rel="stylesheet" href="../css/picnic.min.css">

    <link rel="stylesheet" href="../css/details-event.css">
    <link href="../boostrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Detalles</title>
</head>

<body class="d-flex flex-column ">

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
        <ul class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li>Detalles del evento</li>
</ul> 
            <h1 class="mt-2"> Detalles del evento programado</h1>
            <?php
                    require_once "../bd/conexion.php";
                    $cveEvento = $_POST['id'];
                    $sql = "SELECT
                    e.cve_evento,
                    e.nombre,
                    e.fecha,
                    e.detalles,
                    e.foto,
                    d.nombre,
                    l.marca,
                    l.serie,
                    l.ram,
                    l.disco,
                    l.tipo,
                    l.fotografia,
                    p.nombre,
                    p.apellido,
                    p.curp,
                    p.telefono,
                    p.correo,
                    d.nombre
                FROM
                    evento AS e,
                    departamento AS d,
                    laptop AS l,
                    personal AS p
                WHERE
                    e.cve_laptop = l.cve_laptop AND l.cve_operador = p.cve_persona AND p.cve_departamento = d.cve_departamento AND
                    e.cve_evento = '$cveEvento'";
                    $result = mysqli_query($conexion,$sql);
                    while ($ver = mysqli_fetch_row($result)){

            ?>
               
            <div class="galeria-container text-center">
                <div class="tabs two">
                    <input id='tab-1' type='radio' name='tabgroupB' checked />
                    <label class="pseudo button toggle" for="tab-1">Fotografia 1</label>
                    <input id='tab-2' type='radio' name='tabgroupB'>
                    <label class="pseudo button toggle" for="tab-2">Fotografia 2</label>
                    <div class="row">
                        <div>
                            <img src="../img/<?php echo $ver[11] ?>">
                        </div>
                        <div>
                            <img src="../img/<?php echo $ver[4]?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-sm py-5 text-centered">
            
            <h3>Datos generales del evento</h3>
            <table class="table  table-striped table-bordered border-primary">

                <tbody>
                
                    <tr>
                        
                         <td>Nombre del evento</td>
                         <td><?php echo $ver[1] ?></td>
                    </tr>
                    <tr>
                         <td>Fecha adefinida para el evento</td>
                         <td><?php echo $ver[2] ?></td>
                    </tr>
                    <tr>
                         <td>Descripcción del evento</td>
                         <td><?php echo $ver[3] ?></td>
                    </tr>

                    <tr>
                         <td>Marca del equipo</td>
                         <td><?php echo $ver[6] ?></td>
                    </tr>
                    <tr>
                         <td>Numero de serie del ordenador</td>
                         <td><?php echo $ver[7] ?></td>
                    </tr>
                    <tr>
                         <td>Memoria RAM (GB)</td>
                         <td><?php echo $ver[8] ?></td>
                    </tr>
                    <tr>
                         <td>Capacidad del disco duro (GB)</td>
                         <td><?php echo $ver[9] ?></td>
                    </tr>
                    <tr>
                         <td>Tipo de disco duro</td>
                         <td><?php echo $ver[1] ?></td>
                    </tr>
                    
                </tbody>
            </table>
            <div class="container-sm py-5">
            <h3>Datos generales del propietario</h3>
            <table class="table  table-striped table-bordered border-primary">
                <tbody>
                     <tr>
                         <td>Nombre completo del propietario</td>
                         <td><?php echo $ver[12] ?> <?php echo $ver[13] ?></td>
                    </tr>
                    <tr>
                         <td>CURP</td>
                         <td><?php echo $ver[14] ?></td>
                    </tr>
                    <tr>
                         <td>Numero de contacto del propietario</td>
                         <td><?php echo $ver[15] ?></td>
                    </tr>
                    <tr>
                         <td>Correo electronico</td>
                         <td><?php echo $ver[16] ?></td>
                    </tr>
                    <tr>
                         <td>Nombre del departamento al que pertenece el equipo</td>
                         <td><?php echo $ver[5] ?></td>
                    </tr>
                </tbody>
            </table>
            </div>


        </div>

            <?php } ?>

        </div>

    </main>

</body>
<script src="../js/details-event.js"></script>
<script src="../boostrap/js/bootstrap.min.js"></script>
</html>