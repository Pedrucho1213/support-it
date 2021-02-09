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
    <link rel="stylesheet" href="../css/view-departamento.css">
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
    <li class="breadcrumb-item active" aria-current="page">Visualizar departamento</li>
  </ol>
</nav>
            <h1 class="mt-5">
                Visualizar departamento
            </h1>
            <div class="py-5 container">
                <p>En esta seccón usted podrá visualizar todos los departamentos registrados al igual podrá modificar o
                    eliminar dichos departamentos.</p>
            </div>
            <div class="container table-responsive">
                <div class="table-responsive">
                    <table class="table table-sm align-middle  ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre del departamento</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once "../bd/conexion.php";
                            
                            $sql = "SELECT nombre, cve_departamento from departamento";
                            $result = mysqli_query($conexion,$sql);
                            while ($ver = mysqli_fetch_row($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php echo $ver[1] ?></th>
                                <td><?php echo $ver[0] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic   example">
                                        <button type="button" class="btn btn-outline-success" onclick="showModal('<?php echo $ver[1] ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                                        <form action="../bd/borrar-departamento.php" method="POST" id="deleteDepa">
                                            <input  hidden="" type="text" value="<?php echo $ver[1] ?>" name="iddepa" >
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
        <h5 class="modal-title" id="exampleModalLabel">Modificar departamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../bd/edit-departamento.php" id="editdepa" method="POST">
      <div class="modal-body">
      <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nuevodata" placeholder="name@example.com" name="nuevodepa">
            <label for="nuevodata">Nombre completo del departamento</label>
        </div>
      <input   type="text" hidden="" name="cve" id="inputOculto">
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
<script src="../js/view-departamento.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
</html>

<script type="text/javascript">
     function showModal(data){
         console.log(data)
         document.getElementById('inputOculto').value = data;
     }
</script>