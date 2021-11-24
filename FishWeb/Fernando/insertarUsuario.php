<?php
include "db.php";

$response = array();
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];
$genero = $_POST['genero'];

$queryInsert = "INSERT INTO usuario values (default, '$correo', '$contrasena', '$usuario', '$rol', '$genero');";

$insert = mysqli_query($db, $queryInsert);

$querySelect = "SELECT * from usuario where idUsuario = (select max(idUsuario) from usuario);";
$select = mysqli_query($db, $querySelect);

while($datos = mysqli_fetch_array($select)){
    $idUsuario = $datos['idUsuario'];
}

$response['success'] = 1;
$response['idUser'] = $idUsuario;

echo json_encode($response);
?>