<?php
session_start();

include "db.php";
$response = array();

$autor = $_POST["autor"];
$fecha = $_POST["fecha"];
$categoria = $_POST["categoria"];
$titulo = $_POST["titulo"];
$articulo = $_POST["articulo"];
$publicado = $_POST["publicado"];
$idEsc = $_SESSION['idEsc'];
$idUser = $_SESSION['idUser'];



if($publicado == 'N'){
    $query = "INSERT into articulo values(default, '$autor', '$fecha', '$categoria', '$titulo', '$articulo', '$publicado', '$idEsc')";
    $resultado = mysqli_query($db, $query) or die("Error al insertar los registros");
}else{
    $query = "INSERT into articulo values(default, '$autor', '$fecha', '$categoria', '$titulo', '$articulo', '$publicado', '$idEsc')";
    $resultado = mysqli_query($db, $query) or die("Error al insertar los registros");
}

$response['idUser'] = $idUser;

echo json_encode($response);

?>