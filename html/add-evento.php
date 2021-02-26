<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>' ; 
    }
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <main class="flex-shirink-0">
        <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="navbar.php">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Programar evento</li>
            </ol>
        </nav>
            <h1 class="mt-5">
                Programar evento
            </h1>
            <div class="coantainer-fluid px-5 py-5">
                <form  id="eventoForm2" enctype="multipart/form-data">
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
</html>