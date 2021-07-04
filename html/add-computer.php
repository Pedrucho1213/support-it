<?php
    session_start();

    if (isset($_SESSION['user'])) {
        
    }else {
        echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>' ;  
    }
?>

<!DOCTYPE html>
<html lang="en">

<body>

    <main class="flex-shrink-0">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="navbar.php">Home</a></li>
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
            <form id="formlaptop" enctype="multipart/form-data">

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
</html>