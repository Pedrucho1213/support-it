<?php

require_once "conexion.php";
$cvedepa = $_POST['iddepa'];


$sql = "DELETE FROM departamento WHERE cve_departamento = $cvedepa";
$result = mysqli_query($conexion, $sql);

echo 'ok';

?>
