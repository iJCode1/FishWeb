<?php
$servidor = "localhost";
$usuarioBD = "root";
$pwdBD = "";
$nomBD = "fishWeb";

$db = mysqli_connect($servidor, $usuarioBD, $pwdBD, $nomBD);
if (!$db) {
    die("La conexión fallo: " . mysqli_connect_error());
} else {
    mysqli_query($db, "SET NAMES 'UTF8'");
    // echo 'Si se hizo<br>';
}
?>