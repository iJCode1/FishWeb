<?php
include "db.php";
session_start();
$response = array();
$response['idUser'] = $_SESSION['idUser'];

$fecha = $_POST['fecha'];
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$articulo = $_POST['articulo'];



$query = "UPDATE articulo set fecha = '$fecha', categoria = '$categoria',titulo = '$titulo', articulo = '$articulo'  where idArticulo =" . $_SESSION['id_art'] . ";";

$resultado = mysqli_query($db, $query);
echo json_encode($response);
?>