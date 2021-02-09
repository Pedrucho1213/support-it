<?php
    require_once "conexion.php";

    $cvePersonal = $_POST['idpersonal'];

    $sql = "DELETE FROM personal WHERE cve_persona = $cvePersonal";
    $result = mysqli_query($conexion, $sql);
    echo '<script language="javascript">alert("Personal eliminado sastisfactoriamente. !!!");window.location.href="../html/view-personal.php"</script>';


?>