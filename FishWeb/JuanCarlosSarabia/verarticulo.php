
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="shortcut icon" href="../images/icon/logo.png" type="image/x-icon">
  <title>FishWeb</title>
</head>

<body>
<?php
   session_start();
   if(isset($_SESSION['nombredelusuario'])){
       $usuarioingresado = $_SESSION['nombredelusuario'];
   }
   else{
       header('location: index.php');
   }
   if(isset($_POST['btncerrar'])){
       session_destroy();
       header('location: index.php');
   }

?>
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
                    <a class="nav-link nav__item text-white" href="./index.php">
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
                <li class="nav-item dropdown nav__item text-center">
                <?php
                    echo "<button  class='btn btn-info text-black' style='background-color: #0746BA; font-family: TIMES NEW ROMAN' id='show'> <a   id='navbarDropdown' role='button' data-toggle='dropdown' aria-expanded='false'> </a> <center>  </center> Bienvenido: '$usuarioingresado' ";
                    ?>
                </li>
              </ul>

                <ul class="navbar-nav mr-0 fish__login--btn">
                    <li class="nav-item active text-center nav__item">
                    <button class="btn btn-success my-1 my-sm-1" name="btncerrar" type="submit" style="font-family: TIMES NEW ROMAN">
                        <a class="nav-link text-white nav__item">
                        <i class="fa fa-sign-in fa-icon nav__item"></i> 
                        Cerrar Sesión</a> </button>
                    </li>
                </ul>
               
            </div>
        </nav>
      </div>
    </div>
    <?php
  
  $Titulo = $_GET['titu'];
  $Autor = $_GET['autr'];
  $Categoria = $_GET['cate'];
  $Articulo = $_GET['conten'];
  $Fecha = $_GET['fech'];
  $Foto = $_GET['fot'];
?>
   <div>
       
       <form action="editararti.php" method="POST">
          <table class="estilo1 muestra0 table table-dark table-hover" border="4">
              <tr>
                  <td> Titulo </td>
                  <td> Autor </td>
                  <td> Categoria </td>
                  <td> Contenido </td>
                  <td> Fecha </td>
                  <td> Foto </td>
              </tr>
              <tr>
                  <td name="titu" id="" > <?=$Titulo?></td>
                  <td  name="autr" > <?=$usuarioingresado?> </td>
                  <td name="cate" id=""> <?=$Categoria?> </td>
                  <td name="con" id="" > <?=$Articulo?> </td>
                  <td name="fech" id="" > <?=$Fecha?> </td>
                  <td> <?php echo '<img src="'.$Foto.'" width=120px height=100px/>' ?> </td> 
                 
              </tr>
       
           
          </table>
       </form>

       <br>
       <button type="button" class="btn btn-primary"> <a href="articulos.php" style="text-decoration: none; color: white;"> Regresar </a> </button>
    
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
  <script src="./js/index.js"></script>

</body>

</html>