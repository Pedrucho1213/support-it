<?php
session_start();

if (isset($_SESSION['user'])) {

} else {
    echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>';
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
                            <th scope="col">Nombre completo</th>
                            .
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
                        $result = mysqli_query($conexion, $sql);
                        while ($ver = mysqli_fetch_row($result)) {
                            $data =
                                $ver[0] . "||" .
                                $ver[1] . "||" .
                                $ver[2] . "||" .
                                $ver[3] . "||" .
                                $ver[4] . "||" .
                                $ver[5] . "||" .
                                $ver[6];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $ver[0] ?></th>
                                <td><?php echo $ver[1] ?>  <?php echo $ver[2] ?></td>
                                <td><?php echo $ver[3] ?></td>
                                <td><?php echo $ver[4] ?></td>
                                <td><?php echo $ver[5] ?></td>
                                <td><?php echo $ver[6] ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic   example">
                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"
                                                onclick="editperson('<?php echo $data ?>');">Editar
                                        </button>
                                        <form  id="formpersonaldelete">
                                            <input hidden="" type="text" value="<?php echo $ver[0] ?>"
                                                   name="idpersonal">
                                            <button type="button" class="btn btn-outline-danger" onclick="deletePerson(<?php echo $ver[0] ?>)">Borrar</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Actualizar registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="cerrarModal"></button>
            </div>
            <form id="formpersonEdit">
                <div class="modal-body">
                    <div class="container">

                        <input hidden="" type="text" value="<?php echo $ver[0] ?>" name="idpersonal2" id="idpersonal2">
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nombres" placeholder="name@example.com"
                                           name="nombres" required>
                                    <label for="nombres">Nombre(s)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="apellidos"
                                           placeholder="name@example.com" name="apellidos" required>
                                    <label for="apellidos">Apellido(s)</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="curp" placeholder="name@example.com" name="curp"
                                   required>
                            <label for="curp">CURP</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="telefono"
                                           placeholder="name@example.com" name="telefono" required>
                                    <label for="telefono">Numero de telefono</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="correo" placeholder="name@example.com"
                                           name="correo" required>
                                    <label for="correo">Correo electronico</label>
                                </div>
                            </div>
                        </div>
                        <select class="form-select form-select-sm mb-3" aria-label=".form-select-lg example"
                                name="departamento" id="departaento">
                            <option selected value="0">Seleccionar departamento al que pertenece</option>
                            <?php
                            require_once "../bd/conexion.php";
                            $sql = "SELECT nombre, cve_departamento from departamento";
                            $result = mysqli_query($conexion, $sql);
                            while ($ver = mysqli_fetch_row($result)) {
                                ?>
                                <option value="<?php echo $ver[1] ?>"> <?php echo $ver[0] ?></option>
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
</html>
