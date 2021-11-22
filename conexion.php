<?php
    $server = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bd = "fishweb";

    $conexion = mysqli_connect($server, $usuario, $contrasena, $bd)
        or die ("error en la conexion");

?>