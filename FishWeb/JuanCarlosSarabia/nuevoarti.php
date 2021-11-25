<?php
$titu = $_POST["Titulo"];
$autr = $_POST["Autor"];
$fech = $_POST["Date"];
$cate = $_POST["Categoria"];
$conten = $_POST["Articulo"];
$foto1 = $_POST["fotografia"];
$imagen = '';


if (isset($_FILES["fotografia"])) {
 $file = $_FILES["fotografia"];
 $nombre = $file["name"];
 $tipo = $file["type"];
 $ruta_provisional = $file["tmp_name"];
 $size = $file["size"];
 $dimensiones = getimagesize($ruta_provisional);
 $width = $dimensiones[0];
 $height = $dimensiones[1];
 $carpeta = "fotos/";
 if ($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/JPEG' && $tipo != 'image/png' && $tipo != 'image/gif') {
     echo 'Error, el archivo no es una imagen!';
 } else if ($size > 3 * 1024 * 1024) {
     echo 'Error, el tamaño maximo permitido es de 3MB';
 } else {
     $src = $carpeta . $nombre;
     move_uploaded_file($ruta_provisional, $src);
     $imagen = "fotos/" . $nombre;
 }
 
}

$vare = mysqli_connect("localhost", "root", "", "prograweb");
$query = "INSERT INTO articulo(titulo, autor, fecha, categoria, articulo, foto) VALUES('$titu','$autr','$fech','$cate','$conten','$imagen')";
$rta = mysqli_query($vare, $query);

   if(!$rta){
       echo "Dato no actualizado!";
   }
   else{
    header("location: articulos.php");
    
   }
?>