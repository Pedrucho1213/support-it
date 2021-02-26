<?php
require_once "conexion.php";

$cvelaptop = $_POST['idlaptop'];

$sql = "DELETE FROM laptop WHERE cve_laptop = $cvelaptop";
$result = mysqli_query($conexion, $sql);
echo 'ok';