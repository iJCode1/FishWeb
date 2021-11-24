<?php
include "db.php";
$json = array();
$idArt = $_POST["idArt"];

$query = "DELETE from articulo where idArticulo = $idArt;";

$delete = mysqli_query($db,$query);

$json["exito"] = 1;
echo json_encode($json);
?>