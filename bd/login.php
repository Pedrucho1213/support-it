<?php

$user = $_POST['inputUser'];
$password = $_POST['password'];

require_once "conexion.php";

$sql = "SELECT usuario, contraseña from user where usuario = '$user' AND
contraseña = '$password'";

$result = mysqli_query($conexion,$sql);

$filas = mysqli_num_rows($result);


if ($filas > 0){
    session_start();
    $_SESSION['user'] = $user;
    header("location:../html/home.php");
} else {
    echo '<script language="javascript">alert("Usuario erroneo");window.location.href="../index.html"</script>' ;
}