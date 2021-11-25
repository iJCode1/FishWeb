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
//$correo=$_POST['get-correo'];
$temasInteres = "";
$terminos = "y";
//recorremos el array de cervezas seleccionadas. No olvidarse q la primera posición de un array es la 0 
for ($i=0;$i<count($auxTemaInteres);$i++) {
  if ($i == (count($auxTemaInteres)-1)){
    $temasInteres.=$auxTemaInteres[$i];
  } else {
    $temasInteres.=($auxTemaInteres[$i].'-'); 
  } 
} 

//hacemos la sentencia de sql
$sql= "INSERT INTO lector VALUES (null,'$nombre','$apPaterno','$apMaterno','$edad','$temasInteres','$terminos')";
//ejecutamos la sentencia de sql
$ejecutar = mysqli_query ($conectar, $sql);
//verificamos la ejecucion
if(!$ejecutar){
  echo "Ocurrió Algun Error Al Momento De Insertar";
} else{
  echo "<script>
  alert('Registro Exitoso! Bienvenido $nombre');
  window.location.href ='../registroLectores.html';
  </script>";
}
?>