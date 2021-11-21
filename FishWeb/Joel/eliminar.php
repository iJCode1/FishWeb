<?php 
    include 'db.php';
    $id = $_GET['id_nosotros'];
    $sentencia = "DELETE FROM Nosotros WHERE id_nosotros = $id";

    if(mysqli_query($db, $sentencia)){
        header('Location: nosotrosAdmin.php?mensaje=eliminado');
    } else{
        header('Location: nosotrosAdmin.php?mensaje=error');
    }
?>