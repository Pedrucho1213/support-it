<?php
require_once "conexion.php";


$personal = $_POST['personal'];
$marca = $_POST['marca'];
$serie = $_POST['serie'];
$ram = $_POST['ram'];
$disco = $_POST['disco'];
$tipoDisco = $_POST['tipo'];
$foto = $_FILES['formFile']['name'];

if (isset($_FILES['formFile'])) {
    $temp = $_FILES['formFile']['tmp_name'];
    if (move_uploaded_file($temp, '../img/' . $foto)) {
        chmod('../img/' . $foto, 0777);
    }
}

$sql = "INSERT INTO laptop (marca, serie, ram, disco, tipo, cve_operador, fotografia) VALUES ('$marca', '$serie','$ram','$disco','$tipoDisco', '$personal',  '$foto')";

$result = mysqli_query($conexion, $sql);

echo 'ok';
