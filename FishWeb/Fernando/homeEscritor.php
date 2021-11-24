<!DOCTYPE html>
<html lang="es">
<?php
include "db.php";
$idUser = $_GET["id_user"];
$queryEscritor = "SELECT * FROM escritor  where idUsuario = " . $idUser;
$queryEscritorRes = mysqli_query($db, $queryEscritor) or die("Error al buscar registros");

while($datosEsc = mysqli_fetch_array($queryEscritorRes)){
    $idEscritor = $datosEsc['idEscritor'];
}

$query = "SELECT * FROM articulo  where idEscritor =" . $idEscritor;
$select = mysqli_query($db, $query) or die ("error");
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" href="images/icon/logo.png" type="image/x-icon">
  <title>FishWeb - Escritor</title>
</head>

<body>
<div class="container-fluid mb-4">
    <div class="jumbotron">
      <div class="jumbo__partone">
        <h1 class="display-4 text-white text-center font-weight-bold">FishWeb</h1>
      </div>
      <div class="jumbo__parttwo">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active nav__item text-center">
                    <a class="nav-link nav__item text-white" href="./escritor.php">
                    <i class="fa fa-home fa-icon nav__item"></i>
                    Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown nav__item text-center">
                    <a class="nav-link dropdown-toggle nav__item text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-list fa-icon nav__item"></i>
                    Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Cañas de pesca</a>
                    <a class="dropdown-item" href="#">Anzuelos de pesca</a>
                    <a class="dropdown-item" href="#">Pescados exóticos</a>
                    <a class="dropdown-item" href="#">Lugares en méxico para pescar</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar Articulo" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav mr-0 fish__login--btn">
                    <li class="nav-item active text-center mx-2 nav__item">
                    <a class="nav-link text-white nav__item">
                    <i class="fa fa-user fa-icon nav__item"></i>
                </a>
                </li>
                <li class="nav-item active text-center mx-2 nav__item">
                    <a class="nav-link text-white nav__item" href="login.php">
                    <i class="fa fa-sign-in fa-icon nav__item"></i>
                    Cerrar Sesión
                </a>
                </li>
                </ul>
            </div>
        </nav>
      </div>
    </div>
    <div class="container">
        <h2 class="text-center display-3">Articulos</h2>
        <div class="row">
            <div class="col-12 text-center">
                <button id="crear_nuevo" class="btn btn-success" style="width: 80%; margin: 10px;">Crear nuevo articulo</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Nombre del artículo</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    <th scope="col">Publicar/Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while($datos = mysqli_fetch_array($select)){
                            if($datos['publicado'] == 'N'){
                                echo '<tr>';
                                echo '<td>' . $datos['titulo'] . '</td>';
                                echo '<td>' . $datos['autor'] . '</td>';
                                echo '<td>' . $datos['fecha'] . '</td>';
                                echo '<td><button class="btn btn-warning btn-sm" onclick="editar(' . $datos["idArticulo"] . "," . $idUser . ')">Editar</button></td>';
                                echo '<td><button class="btn btn-danger btn-sm" onclick="eliminar(' . $datos["idArticulo"] . ')">Eliminar</button></td>';
                                echo '<td><button class="btn btn-primary btn-sm" onclick="publicar(' . $datos["idArticulo"] . ')">Publicar</button></td>';                        
                                echo '</tr>';  
                            }
                            if($datos['publicado'] == 'Y'){
                                echo '<tr>';
                                echo '<td>' . $datos['titulo'] . '</td>';
                                echo '<td>' . $datos['autor'] . '</td>';
                                echo '<td>' . $datos['fecha'] . '</td>';
                                echo '<td></td>';
                                echo '<td></td>';
                                echo '<td><button class="btn btn-info btn-sm" onclick="visualizar(' . $datos["idArticulo"] . "," . $idUser .  ')">Visualizar</button></td>';                        
                                echo '</tr>';  
                            }
                        }                       
                    ?>               
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<footer class="fixed-bottom">
    <p>FishWeb</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>
    <script src="librerias/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        function editar(id, idUser) {
            window.location.href = "vistaEditarArt.php?id_art="+id+"&idUser="+idUser;
        }
        function visualizar(id, idUser) {
            window.location.href = 'visualizarArticulo.php?id_user='+idUser+"&id_art="+id;
        }
        function eliminar(id) {
            $.ajax({
            type: "POST",
            url: 'eliminarArticulo.php',
            data: {"idArt" : id},
            dataType: "json",
            success: function(response)
                {
                    if(response.exito == 1){
                        swal("Exito", "Articulo eliminado correctamente!", "success");
                        location.reload();
                    }
                    
                }
        });
        }
        function publicar(id) {
            $.ajax({
            type: "POST",
            url: 'publicarArticulo.php',
            data: {"idArt" : id},
            dataType: "json",
            success: function(response)
                {
                    if(response.success == 1){
                        swal("Exito", "Articulo Publicado correctamente!", "success");
                        location.reload();
                    }
                    
                }
        });
        }
    </script>
    <?php
  echo "<script>";
    echo  "$(document).ready(function(){";
        echo   "$('#crear_nuevo').click(function(){";
            echo      "window.location.href = 'EscritorEscribe.php?id_user=" . $idUser . "';";
            echo  "});";
            echo "});";
  echo "</script>";
  ?>
  <script>
      $("#btn_guardar").click(function(){
        var datosArticulo = {
          "autor" : $("#Nombre_escritor").val() + " " + $("#Nombre_apellidoP").val() + " " + $("#Nombre_apellidoM").val(),
          "fecha" : $("#fecha").val(),
          "categoria" : $("#categoria").val(),
          "titulo" : $("#titulo").val(),
          "articulo" : $("#textarea").val(),
          "publicado" : "Y"
        };

        $.ajax({
            type: "POST",
            url: 'crearArticulo.php',
            data: datosArticulo,
            success: function(response)
                {
                    swal("Exito", "articulo Publicado correctamente!", "success");
                      
                }
        });
       
      });
  </script>
</body>

</html>