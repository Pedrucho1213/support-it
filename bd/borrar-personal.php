<?php
require_once "conexion.php";

$cvePersonal = $_POST['idpersonal'];

$sql = "DELETE FROM personal WHERE cve_persona = $cvePersonal";
$result = mysqli_query($conexion, $sql);
echo 'ok';


?>