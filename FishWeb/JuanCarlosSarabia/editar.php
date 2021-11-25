<?php
  include 'conexion.php';
    $id = $_GET['id_escritor'];
   $Nombre = $_POST['nomb'];
   $Apellidop = $_POST['app'];
   $Apellidom = $_POST['apM'];
   $Edad = $_POST['edd'];
   
   $RFC = $_POST['rf'];
   $Direccion = $_POST['direc'];
   $Telefono = $_POST['tele'];
   $Referencia = $_POST['refere'];
   

   $vare = mysqli_connect("localhost", "root", "", "prograweb");
   $sql = "UPDATE escritor SET nombre='$Nombre', apellidoP='$Apellidop', apellidoM='$Apellidom', edad='$Edad', rfc='$RFC', direccion='$Direccion', telefono='$Telefono', referencia='$Referencia'  WHERE id_escritor=$id";
   $rta = mysqli_query($vare, $sql);

   if(!$rta){
       echo "Dato no actualizado!";
   }
   else{
    echo "<script>alert('Datos modificados correctamente');</script>";
    
   }

?>