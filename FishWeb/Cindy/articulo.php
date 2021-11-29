<!DOCTYPE html>
<html lang="es">
<?php
include "db.php";
session_start();

$genero = $_SESSION["genero"];
$usuario = $_SESSION["usuario"];


$sentencia = "SELECT * FROM articulo WHERE categoria='Cañas de pesca'";


$res_consulta = mysqli_query($db, $sentencia);
$i = mysqli_fetch_array($res_consulta);

$sentencia2 = "SELECT * FROM comentarios WHERE articulo=''".$i['articulo'];

?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="shortcut icon" href="../images/icon/logo.png" type="image/x-icon">
  <title>FishWeb - Articulo</title>
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
                    <a class="nav-link nav__item text-white" href="./lector.php">
                    <i class="fa fa-home fa-icon nav__item"></i>
                    Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown nav__item text-center">
                    <a class="nav-link dropdown-toggle nav__item text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-list fa-icon nav__item"></i>
                    Categorías
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="articulo.php">Cañas de pesca</a>
                    <a class="dropdown-item" href="articulos.php">Anzuelos de pesca</a>
                    <a class="dropdown-item" href="articulos.php">Pescados exóticos</a>
                    <a class="dropdown-item" href="articulos.php">Lugares en méxico para pescar</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar Articulo" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav mr-0 fish__login--btn">
                <li class="nav-item dropdown nav__item text-center">
                    <a class="nav-link dropdown-toggle nav__item text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-icon nav__item"></i>
    <?php
if ($genero != "") {
    if ($genero == "F") {
        echo "Bienvenida  " . $usuario;
    } else if($genero == "M") {
        echo "Bienvenido  " . $usuario;
    }
    ?><?php
}?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="lector.php">Perfil</a>
                    <a class="dropdown-item" href="editar.php">Modificar mis datos</a>
                </li>

                <li class="nav-item active text-center mx-2 nav__item">
                    <a class="nav-link text-white nav__item" href="salir.php">
                    <i class="fa fa-sign-in fa-icon nav__item"></i>
                    Cerrar Sesión
                </a>
                </li>
                
                </ul>
            </div>
        </nav>
      </div>
    </div>

    <div class="text-center">
    <h1>Articulo<hr></h1>
    </div>

    <div>
    <div class="container text-center">

    <div class="row">
        <div class="col-4">
        <div class="form-group">
        <label for="autor">Autor</label>
        <input required name="autor" type="text" class="form-control" id="autor" value="<?php echo $i['autor'] ?>" disabled>                            
    </div>
    
        </div>

        <div class="col-4">
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input required name="fecha" type="text" class="form-control" id="fecha"  value="<?php echo $i['fecha'] ?>" disabled>                            
        </div>

        </div>

        <div class="col-4">
        <div class="form-group">
          <label for="categoria">Temas de interes: </label>
            <select class="form-control" id="categoria" disabled>
              <option value="Canas">Cañas de pesca</option>
              <option value="Anzuelos">Anzuelos de pezca</option>
              <option value="Pescados">Pescados exóticos</option>
              <option value="Lugares">Lugares en México para pescar</option>
            </select>
        </div>
        </div>
      
      </div>
     
      <div class="form-group">
              <label for="titulo"><strong>Titulo del articulo: <hr></strong> </label>
              <input  value="<?php echo $i['titulo'] ?>" required name="titulo" type="text" class="form-control" id="titulo" disabled>                            
          </div>
          <div class="form-group">
              <label for="textarea"><strong>Contenido: <hr></strong> </label>
              <textarea name="textarea" style="padding: 30px; width: 95%; margin: 0 auto;" class="form-control rounded-0" id="textarea" rows="30" disabled><?php echo $i['articulo'] ?></textarea>                            
          </div>

          <div class="row">
        
          <div class="col-8">    
        <div class="form-group">
              <label for="textarea"><strong>Comentarios: <hr></strong> </label>
              <textarea name="textarea" style="padding: 50px; width: 90%; margin: 0 auto;" class="form-control rounded-0" id="textarea" rows="2"  value="<?php echo $i['articulo'] ?>" required></textarea>                            
          </div>       
        </div>

        <div class="col-3">        
        <button id="btn_regresar" class="btn btn-info" style="width: 100%; margin-top: 120px;" type="button">Comentar</button> 
        </div>
        
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

<?php
echo "<script>";
echo "$('#btn_regresar').click(function(){";
    echo "window.location.href = 'homeEscritor.php?id_user=" . $idUsuario . "';";
echo "});";
echo "</script>";
?>

      

      
  


</body>

</html>