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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="../alertify/css/alertify.min.css"/>
    <link href="/boostrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/view-personal.css">
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
    <li class="breadcrumb-item active" aria-current="page">Visualizar personal</li>
  </ol>
</nav>
            <div class="container">
                <h1 class="mt-5">
                    Visualizar personal
                </h1>
                <div class="py-5 container">
                    <p>En esta sección usted podrá visualizar todo el personal registrado de igual manera usted podra
                        modificar los datos o eliminar el registro del personal.
                    </p>
                </div>
                <div class="container table-responsive text-center">
                    <div class="table-responsive">
                        <table class="table table-sm align-middle  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre completo</th>.
                                    <th scope="col">CURP</th>
                                    <th scope="col">Numero de telefono</th>
                                    <th scope="col">Correo electronico</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once "../bd/conexion.php";
                                    $sql = "SELECT
                                            p.cve_persona,
                                            p.nombre,
                                            p.apellido,
                                            p.curp,
                                            p.telefono,
                                            p.correo,
                                            d.nombre
                                        FROM
                                            personal AS p,
                                            departamento AS d
                                        WHERE
                                            p.cve_departamento = d.cve_departamento";
                                            $result = mysqli_query($conexion,$sql);
                                            while ($ver = mysqli_fetch_row($result)){
                                            $data = 
                                                $ver[0]."||".
                                                $ver[1]."||".
                                                $ver[2]."||".
                                                $ver[3]."||".
                                                $ver[4]."||".
                                                $ver[5]."||".
                                                $ver[6];
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $ver[0] ?></th>
                                    <td><?php echo $ver[1]?> <?php echo $ver[2]?></td>
                                    <td><?php echo $ver[3]?></td>
                                    <td><?php echo $ver[4]?></td>
                                    <td><?php echo $ver[5]?></td>
                                    <td><?php echo $ver[6]?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic   example">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="editperson('<?php echo $data ?>');">Editar</button>
                                            <form action="../bd/borrar-personal.php" method="POST" id="formpersonal">
                                                 <input  hidden="" type="text" value="<?php echo $ver[0] ?>" name="idpersonal" >
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
            </div>
    </main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container">
                <form action="../bd/edit-personal.php" method="POST" id="formperson">
                <input  hidden="" type="text" value="<?php echo $ver[0] ?>" name="idpersonal2" id="idpersonal2" >
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombres" placeholder="name@example.com" name="nombres" required>
                                <label for="nombres">Nombre(s)</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="apellidos" placeholder="name@example.com" name="apellidos" required>
                                <label for="apellidos">Apellido(s)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="curp" placeholder="name@example.com" name="curp" required>
                        <label for="curp">CURP</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="telefono" placeholder="name@example.com" name="telefono" required>
                                <label for="telefono">Numero de telefono</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="correo" placeholder="name@example.com" name="correo" required>
                                <label for="correo">Correo electronico</label>
                            </div>
                        </div>
                    </div>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example" name="departamento" id="departaento">
                        <option selected value="0">Seleccionar departamento al que pertenece</option>
                        <?php
                            require_once "../bd/conexion.php";
                            $sql = "SELECT nombre, cve_departamento from departamento";
                            $result = mysqli_query($conexion,$sql);
                            while ($ver = mysqli_fetch_row($result)){
                       ?>
                        <option value="<?php echo $ver[1] ?>"><?php echo $ver[0] ?></option>
                        <?php } ?>
                    </select>
                
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>
<script src="../boostrap/js/bootstrap.min.js"></script>
<script src="../js/view-personal.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</html>

<script type="text/javascript">
function editperson(data){
    d = data.split('||');
    console.log(d);
    document.getElementById('idpersonal2').value = d[0];
    document.getElementById('nombres').value = d[1];
    document.getElementById('apellidos').value = d[2];
    document.getElementById('curp').value = d[3];
    document.getElementById('telefono').value = d[4];
    document.getElementById('correo').value = d[5];
    document.getElementById('departaento').value = d[6];
}
</script>