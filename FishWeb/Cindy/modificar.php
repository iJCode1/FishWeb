<?php
include 'db.php';
$usuario = $contraseña = $categoria = $userErr = $contraseñaErr = $categoriaErr = $Errore = "";
$usuario = $_POST['txtUsuario'];
$contraseña = $_POST['txtContraseña'];
$categoria = $_POST['txtCategoria'];
echo $usuario;
echo $contraseña;
echo $categoria;


$sentencia1 = "UPDATE lector set categoria='$categoria'";
$sentencia2 = "UPDATE usuario set usuario='$usuario', contraseña='$contraseña'";

if (mysqli_query($db, $sentencia1)) 
{
    if(mysqli_query($db, $sentencia2)) 
    {
        header('Location: lector.php?mensaje=editado');
    }
    
} else 
{
    header('Location: lector.php?mensaje=no_editado');
}