<?php
require_once "conexion.php";

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$curp = $_POST['curp'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$departamento = $_POST['departamento'];

$sql = "INSERT INTO personal (nombre, apellido, curp, telefono, correo, cve_departamento) VALUES ('$nombres','$apellidos','$curp','$telefono','$correo', '$departamento')";
$result = mysqli_query($conexion,$sql);

echo '<script language="javascript">alert("Los datos fueron registrados correctamente");window.location.href="../html/add-personal.php"</script>' ;

?>