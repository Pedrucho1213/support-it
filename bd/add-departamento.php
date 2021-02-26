<?php

require_once "conexion.php";
$departamento = $_POST['departamento'];

$sql = "INSERT INTO departamento (nombre) values ('$departamento')";
$result = mysqli_query($conexion,$sql);

echo 'ok';


