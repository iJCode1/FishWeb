<?php
//conectamos Con el servidor
$conectar = mysqli_connect ('localhost', 'root','','fishweb');
//verificamos la conexion
if(!$conectar){
  echo "No Se Pudo Conectar Con El Servidor";
}
//recuperar las variables
$nombre=$_POST['get-nombre'];
$apPaterno=$_POST['get-apPaterno'];
$apMaterno=$_POST['get-apMaterno'];
$edad=$_POST['get-edad'];
$auxTemaInteres=$_POST['get-catInteres'];
$correo=$_POST['get-correo'];
$pass=$_POST['get-pass'];
$usuario=$_POST['get-usuario'];
$genero=$_POST['get-genero'];

//$correo=$_POST['get-correo'];
$temasInteres = "";
$terminos = "y";
$rol = "lector";
//recorremos el array de cervezas seleccionadas. No olvidarse q la primera posición de un array es la 0 
for ($i=0;$i<count($auxTemaInteres);$i++) {
  if ($i == (count($auxTemaInteres)-1)){
    $temasInteres.=$auxTemaInteres[$i];
  } else {
    $temasInteres.=($auxTemaInteres[$i].'-'); 
  } 
} 

//hacemos las sentencias de sql
$sqla= "INSERT INTO lector VALUES (null,'$nombre','$apPaterno','$apMaterno','$edad','$temasInteres','$terminos')";
$ejecutara = mysqli_query ($conectar, $sqla);

$sqlb= "INSERT INTO usuarios VALUES (null,'$correo','$pass','$usuario','$rol','$genero')";
$ejecutarb = mysqli_query ($conectar, $sqlb);

//verificamos la ejecucion
if(!$ejecutara || !$ejecutarb){
  echo "Ocurrió Algun Error Al Momento De Insertar";
} else{
  echo "<script>
  alert('Registro Exitoso! Bienvenido $nombre');
  window.location.href ='../login.html';
  </script>";
}
?>