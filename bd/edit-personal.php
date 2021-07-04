<?php
require_once "conexion.php";

$cve_persona = $_POST['idpersonal2'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$curp = $_POST['curp'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$departamento = $_POST['departamento'];

$sql = "UPDATE personal set
                nombre ='$nombres',
                apellido ='$apellidos',
                curp ='$curp',
                telefono ='$telefono',
                correo ='$correo',
                cve_departamento ='$departamento'
                WHERE
                cve_persona = '$cve_persona'";

$result = mysqli_query($conexion, $sql);

echo 'ok';


