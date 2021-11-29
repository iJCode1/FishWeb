<?php
include 'db.php';
session_start();
$usuario = $_SESSION["usuario"];
$articulo = $_POST['titulo'];
$comentario =$_POST['comentario'];
echo $usuario;
echo $articulo;
echo $comentario;


$sentencia2 = "INSERT INTO comentarios(usuario,articulo,comentario) VALUES('$usuario','$articulo','$comentario')";
if (mysqli_query($db, $sentencia3)) 
{
header('Location: articulo.php?mensaje=registrado');

} else 
{
header('Location: articulo.php?mensaje=no registrado');
}