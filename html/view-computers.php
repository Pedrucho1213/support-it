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
    <link rel="stylesheet" href="../css/view-computer.css">
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
                <li class="breadcrumb-item active" aria-current="page">Visualizar computadoras</li>
            </ol>
        </nav>
                <h1 class="mt-5">
                    Visualizar registro de computadoras
                </h1>
                <div class="py-5 container">
                    <p>En esta sección usted podrá visualizar todos los registros de las computadoras que operan dentro
                        de la empresa y de igla manera podra editar o eliminar los registros según la necesidad que se
                        presente.
                    </p>
                </div>
                <div class="container table-responsive text-center">
                    <div class="table-responsive">
                        <table class="table table-sm align-middle  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fotografia</th>.
                                    <th scope="col">Marca y modelo</th>
                                    <th scope="col">Serie</th>
                                    <th scope="col">Operador</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "../bd/conexion.php";
                            $sql = "SELECT
                                        l.cve_laptop,
                                        l.marca,
                                        l.serie,
                                        l.ram,
                                        l.disco,
                                        l.tipo,
                                        p.nombre,
                                        p.apellido,
                                        l.fotografia,
                                        l.cve_operador
                                    FROM
                                        laptop AS l,
                                        personal AS p
                                    WHERE
                                        l.cve_operador = p.cve_persona";
                            $result = mysqli_query($conexion,$sql);
                            while ($ver = mysqli_fetch_row($result)){
                                $data = 
                                $ver[0]."||".
                                $ver[1]."||".
                                $ver[2]."||".
                                $ver[3]."||".
                                $ver[4]."||".
                                $ver[5]."||".
                                $ver[6]."||".
                                $ver[7]."||".
                                $ver[8]."||".
                                $ver[9];
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $ver[0] ?></th>
                                    <td>
                                        <img src="../img/<?php echo $ver[8] ?>" class="img-thumbnail" width="200" height="200" alt="...">
                                    </td>
                                    <td><?php echo $ver[1] ?></td>
                                    <td><?php echo $ver[2] ?></td>
                                    <td><?php echo $ver[6] ?> <?php echo $ver[7] ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic   example">
                                            <button type="button" class="btn btn-outline-success"data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editLaptop('<?php echo $data ?>')">Editar</button>
                                            <form action="../bd/borrar-compuater.php" method="POST" id="formlaptop">.
                                                <input  hidden="" type="text" value="<?php echo $ver[0] ?>" name="idlaptop" id="idlaptop">
                                                <button type="submit" class="btn btn-outline-danger">Borrar</button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
    </main>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form action="../bd/edit-computers.php" method="POST" id="formupdateLaptop" enctype="multipart/form-data">

            

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
                            <input  hidden="" type="number" value="" name="cve_laptop" id="cve_laptop2" >
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
                        <div class="mb-3 form-control-lg py-1">
                            <label for="formFile" class="form-label">Capturar fotografia frontal del equipo</label>
                            <input class="form-control" type="file" id="formFile2" name="formFile2">
                        </div>
                    </div>
                    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
      
      </form>
    </div>
  </div>
</div>
</body>

<script src="../boostrap/js/bootstrap.min.js"></script>
<script src="../js/view-computers.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</html>

<script type="text/javascript">
function editLaptop(data){
    d = data.split('||');
    document.getElementById('personal').value = d[9];
    document.getElementById('marca').value = d[1];
    document.getElementById('serie').value = d[2];
    document.getElementById('ram').value = d[3];
    document.getElementById('disco').value = d[4];
    document.getElementById('tipo').value = d[5];
    document.getElementById('cve_laptop2').value = d[0];
    document.getElementById('formFile').value = d[6];

}
</script>