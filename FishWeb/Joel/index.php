<?php

?>
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
                <li class="nav-item active nav__item text-center">
                    <a class="nav-link nav__item text-white" href="./nosotros.php">
                    <i class="fa fa-users fa-icon nav__item"></i>    
                    Nosotros </a>
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
                    <li class="nav-item active text-center nav__item">
                        <a class="nav-link text-white nav__item" href="./login.php">
                        <i class="fa fa-sign-in fa-icon nav__item"></i>
                        Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
      </div>
    </div>
    <h2 class="text-center text-success my-4 display-4">Galería de imágenes</h2>
    <div id="carouselExampleCaptions" class="carousel slide carouselWrapper" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1568134679903-5dcc1aa5bed3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="Pescando en el atardecer">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pescando en el atardecer</h5>
                <p>Una persona saliendo a perseguir su sueño de pescar en el atardecer</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1515631604561-23e0be68ee06?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" class="d-block w-100" alt="Pescando un Pez">
            <div class="carousel-caption d-none d-md-block">
                <h5>Atrapando un gran pescado</h5>
                <p>Una persona saliendo a pescar con un excelente clima</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1598191923254-af7988ba53c5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1633&q=80" class="d-block w-100" alt="Pescando con red">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pesca con red</h5>
                <p>Tratando de abarcar más zona de pesca con una red</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1551131618-3f0a5cf594b4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" class="d-block w-100" alt="Pescando con varias cañas de pesca">
            <div class="carousel-caption d-none d-md-block">
                <h5>Sistema de 6 cañas de pesca</h5>
                <p>Probando un sistema de 6 cañas de pesca automáticas</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1533060498584-2f538c6f84fc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1087&q=80" class="d-block w-100" alt="Pescando un pequeño pez">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pescando un pequeño pescado</h5>
                <p>Comenzando el día pescando un pequeño pez</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
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
  <script src="./js/index.js"></script>
</body>

</html>
