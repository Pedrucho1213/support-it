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
                 <li class="breadcrumb-item active" aria-current="page">Registrar personal</li>
            </ol>
        </nav>
            <h1 class="mt-5">
                Registrar personal
            </h1>
            <div class="py-5 container">
                <p>Para registrar personal primero debe registrar los departamentos existentes dentro de la mepresa.</p>
            </div>
            <div class="container">
                <form id="formperson">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nombres" required>
                                <label for="floatingInput">Nombre(s)</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="apellidos" required>
                                <label for="floatingInput">Apellido(s)</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="curp" required>
                        <label for="floatingInput">CURP</label>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com" name="telefono" required>
                                <label for="floatingInput">Numero de telefono</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="correo" required>
                                <label for="floatingInput">Correo electronico</label>
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
                    <div class="d-grid col-6 mx-auto py-5">
                        <button class="btn btn-outline-success" type="submit">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>