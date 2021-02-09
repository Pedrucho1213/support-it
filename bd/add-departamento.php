<?php

require_once "conexion.php";
$departamento = $_POST['departamento'];

$sql = "INSERT INTO departamento (nombre) values ('$departamento')";
$result = mysqli_query($conexion,$sql);

echo '<script language="javascript">alert("Los datos fueron registrados correctamente");window.location.href="../html/add-departamento.html"</script>' ;

