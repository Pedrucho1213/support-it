<?php
$conexion = new mysqli("127.0.0.1", "root", "", "supportit", 3306);
if ($conexion->connect_error) {
    echo "Falló al conctar a MySql: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}
