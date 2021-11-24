<?php
include "db.php";
    $idArt = $_POST['idArt'];

    $query = "UPDATE articulo set publicado = 'Y' WHERE idArticulo = $idArt;";

    $resultado = mysqli_query($db, $query);
    $response = array();
    $response['success'] = 1;
    echo json_encode($response);


?>