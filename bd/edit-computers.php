<?php
require_once "conexion.php";

$cve_laptop = $_POST['cve_laptop'];
$personal = $_POST['personal'];
$marca = $_POST['marca'];
$serie = $_POST['serie'];
$ram = $_POST['ram'];
$disco = $_POST['disco'];
$tipoDisco = $_POST['tipo'];
$foto = $_FILES['formFile2']['name'];

if (isset($_FILES['formFile2'])) {
    $temp = $_FILES['formFile2']['tmp_name'];
    if (move_uploaded_file($temp, '../img/' . $foto)) {
        chmod('../img/' . $foto, 0777);
    }
}

$sql = "UPDATE laptop set
        marca ='$marca',
        serie ='$serie',
        ram ='$ram',
        disco ='$disco',
        tipo ='$tipoDisco',
        cve_operador ='$personal',
        fotografia ='$foto'
        WHERE
        cve_laptop = '$cve_laptop'";

$result = mysqli_query($conexion, $sql);


echo 'ok';
