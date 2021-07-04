<?php
session_start();

if (isset($_SESSION['user'])) {

} else {
    echo '<script language="javascript">alert("Se requiere el inicio de sesión");window.location.href="../bd/cerrar-sesion.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">


<body class="d-flex flex-column">
<main class="flex-shrink-0">

    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
            <form class="d-flex" id="eventSearch">
                <input class="form-control me-2" type="search" placeholder="Buscar evento" aria-label="Search"
                       name="inputsearch" id="inputsearch">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
        </nav>
        <h1 class="mt-5">
            Eventos programados
        </h1>
        <div class="container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <!-- Galeria de tarjetas -->
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <!-- Componentes de cards -->
                        <?php
                        require_once "../bd/conexion.php";
                        $sql = "SELECT
                                e.cve_evento,
                                e.nombre,
                                l.marca,
                                l.serie,
                                l.fotografia,
                                d.nombre,
                                TIMESTAMPDIFF(DAY, CURDATE(), e.fecha ) AS dias_transcurridos
                            FROM
                                evento AS e,
                                departamento AS d,
                                laptop AS l,
                                personal AS p
                            WHERE
                                e.cve_laptop = l.cve_laptop AND l.cve_operador = p.cve_persona AND d.cve_departamento = p.cve_departamento";
                        $result = mysqli_query($conexion, $sql);
                        while ($ver = mysqli_fetch_row($result)) {
                            ?>
                            <div class="col">
                                <div class="card shadow-sm">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" role="img"
                                         src="../img/<?php echo $ver[4] ?>" preserveAspectRatio="xMidYMid slice"
                                         focusable="false">
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    </img>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $ver[1] ?></h5>
                                        <p class="card-text">
                                            <?php echo $ver[2] ?> <?php echo $ver[3] ?>
                                            <br>
                                            <?php echo $ver[5] ?>
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form>
                                                    <input type="text" hidden="" name="id"
                                                           value="<?php echo $ver[0] ?>">
                                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                                            onclick="detailsEvent(<?php echo $ver[0] ?>)">
                                                        Detalles
                                                    </button>
                                                </form>
                                            </div>
                                            <small class="text-muted">Dentro de <?php echo $ver[6] ?> días</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


</body>
</html>