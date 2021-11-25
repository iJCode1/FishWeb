<?php
include 'conexion.php';
$id= $_GET["id_articulo"];
$Titulo = $_POST["titu"];
$Autor = $_POST["autr"];

$Categoria = $_POST["cate"];
$Contenido = $_POST["con"];
$foto1 = $_POST["fotografia"];




$vare = mysqli_connect("localhost", "root", "", "prograweb");
$query = "UPDATE articulo SET autor='$Autor',  categoria='$Categoria', titulo='$Titulo', articulo='$Contenido'  WHERE id_articulo=$id";
$rta = mysqli_query($vare, $query);

   if(!$rta){
       echo "Dato no actualizado!";
   }    
   else{
    header("location: articulos.php");
    
   }