<?php

include "conexion.php";

$Nombre = $_POST['Nombre'];
$apPat = $_POST['apPat'];
$apMat = $_POST['apMat'];
$RFC = $_POST['RFC'];
$Edad = $_POST['Edad'];
$Direccion = $_POST['Direccion'];
$Telefono = $_POST['Telefono'];
$RefArt = $_POST['RefArt'];

$insertar = "INSERT into escritor values(default, '$Nombre', '$apPat', '$apMat', '$Edad', 'categoria1', 'Y', '$RFC', '$Direccion', '$Telefono', '$RefArt')";

$resultado = mysqli_query($conexion, $insertar) or die("Error al insertar los registros");

mysqli_close($conexion);
echo "<script>";

echo "alert('los datos se actualizaron correctamente')";

echo "</script>";
?>
