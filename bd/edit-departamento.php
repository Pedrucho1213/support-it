<?php
require_once "conexion.php";

$cve = $_POST['cve'];
$newDepa = $_POST['nuevodepa'];

$sql = "UPDATE departamento set nombre = '$newDepa' WHERE cve_departamento = '$cve'";
$result = mysqli_query($conexion,$sql);
echo '<script language="javascript">alert("Los datos fueron actualizados correctamente");window.location.href="../html/view-departamento.php"</script>' ;

?>