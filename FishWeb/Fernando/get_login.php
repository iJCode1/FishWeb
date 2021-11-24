<?php
    include "db.php";
    $response = array();
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $query = "SELECT * FROM usuario where correo = '$usuario' and contrasena = '$contrasena'";
    $datos = mysqli_query($db, $query);

   if(mysqli_num_rows($datos) == 0){
    $response['status'] = 0;
   }else{
    $response['status'] = 1;
    while($array = mysqli_fetch_array($datos)){
        $response['rol'] = $array['rol'];
        $response['id_user'] = $array['idUsuario'];
    }
   }

   echo json_encode($response);
?>