<?php
require_once "conexion.php";


$nameEvent = $_POST['nameEvent'];
$laptop = $_POST['laptop'];
$fechaEvento = $_POST['fechaEvento'];
$detalles = $_POST['detalles'];
$foto = $_FILES['foto1']['name'];

if (isset($_FILES['foto1'])) {
    $temp = $_FILES['foto1']['tmp_name'];
    if (move_uploaded_file($temp, '../img/' . $foto)) {
        chmod('../img/' . $foto, 0777);
    }
}
$sql = "INSERT INTO evento (nombre, fecha, detalles, cve_laptop, foto) values ('$nameEvent','$fechaEvento','$detalles','$laptop','$foto')";
$result = mysqli_query($conexion, $sql);

echo 'ok';

