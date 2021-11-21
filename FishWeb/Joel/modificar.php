<?php
include 'db.php';
$nombre = $carrera = $numero = $nameErr = $carreraErr = $numeroErr = $Errore = "";
$nombre = $_POST['txtNombre'];
$carrera = $_POST['txtCarrera'];
$numero = $_POST['txtNumeroControl'];
$id = $_GET['id_nosotros'];
echo $id;

echo $nombre;
echo $carrera;
echo $numero;


$sentencia = "UPDATE Nosotros set nombre='$nombre', carrera='$carrera', numero_control='$numero' WHERE id_nosotros = $id";

if (mysqli_query($db, $sentencia)) {
    header('Location: nosotrosAdmin.php?mensaje=editado');
    // echo 'Si se tiene la edicion';
} else {
    header('Location: nosotrosAdmin.php?mensaje=no_editado');
    // echo 'No se tiene la edicion';
}