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


<main class="flex-shirink-0">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="navbar.php">Home</a></li>
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
                    $result = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($result)) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $ver[1] ?></th>
                            <td><?php echo $ver[0] ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic   example">
                                    <button type="button" class="btn btn-outline-success"
                                            onclick="editDepa('<?php echo $ver[1] ?>')" >Editar
                                    </button>
                                    <form id="deleteDepa">
                                        <input hidden="" type="text" value="<?php echo $ver[1] ?>" name="iddepa">
                                        <button type="button" class="btn btn-outline-danger" onclick="deleteDepa('<?php echo $ver[1] ?>')">Borrar</button>
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
</body>
</html>
