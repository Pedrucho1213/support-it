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
    <link rel="stylesheet" href="../css/picnic.min.css">
    <link rel="stylesheet" href="../css/details-event.css">
    <title>Detalles</title>
</head>

<body class="d-flex flex-column ">
    <main class="flex-shrink-0">
        <div class="container">
        <ul class="breadcrumb">
  <li><a href="navbar.php">Home</a></li>
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
</html>