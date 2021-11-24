<?php
include "db.php";
session_start();
if (isset($_POST['nombre'])){
    $Nombre = $_POST['nombre'];
    $apPat = $_POST['apPat'];
    $apMat = $_POST['apMat'];
    $RFC = $_POST['RFC'];
    $Edad = $_POST['Edad'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $RefArt = $_POST['RefArt'];
    $categoria = $_POST['categoria'];
    $idUsuario = $_SESSION['idUserPer'];

    $insertar = "INSERT into escritor values(default, '$Nombre', '$apMat', '$apPat', '$Edad', '$categoria', 'Y', '$RFC', '$Direccion', '$Telefono', '$RefArt', $idUsuario)";

    $resultado = mysqli_query($db, $insertar) or die("Error al insertar los registros");

    mysqli_close($conexion);

    echo json_encode(array('success' => 1));
}else{
    echo json_encode(array('success' => 0));
}

?>
