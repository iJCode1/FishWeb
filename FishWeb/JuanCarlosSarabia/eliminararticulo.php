<?php
  $IDArticulo = $_GET['id'];

  $vare = mysqli_connect("localhost", "root", "", "prograweb");
   $sql = "DELETE FROM articulo WHERE id_articulo=$IDArticulo";
   $rta = mysqli_query($vare, $sql);

   if(!$rta){
       echo "Dato no eliminado!";
   }
   else{
       header("Location: articulos.php ");
   }
  ?> 