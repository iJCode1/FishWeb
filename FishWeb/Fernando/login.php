<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="shortcut icon" href="images/icon/logo.png" type="image/x-icon">
  <title>FishWeb - Ingreso</title>
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
                <form class="form-inline my-2 my-lg-0" class="form__login px-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
    <main class="form__login--wrapper">
      <h2 class="text-center mt-5">Por favor proporcione sus credenciales</h2>
      <div class="card mt-4">
        <div class="card-body">
          <h3 class="text-white text-center py-1 login__title">
            <i class="fa fa-lock"></i>
            Login</h3>
          <form class="form__login px-4" method="post">
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="InputEmail1">Correo</label>
              <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                placeholder="Correo" name="txtCorreo">
            </div>
            <div class="form-group">
              <i class="fa fa-eye"></i>
              <label for="InputPassword1">Contraseña</label>
              <input type="password" class="form-control" id="InputPassword1" placeholder="Contraseña"
                name="txtContraseña">
            </div>
            <p class="text-center">¿No tienes cuenta? <span><a href="registroUsuario.php">Crear Cuenta</a></span></p>
            <button type="button" class="btn btn-success btn-block" id="btn_login">
              <i class="fa fa-sign-in"></i>
              Iniciar</button>
          </form>
        </div>
      </div>
    </main>
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
    $(document).ready(function(){
      $("#btn_login").click(function(){
        var datos = {
          "usuario" : $("#InputEmail1").val(),
          "contrasena" : $("#InputPassword1").val()
        };

        $.ajax({
            type: "POST",
            url: 'get_login.php',
            data: datos,
            dataType: "json",
            success: function(response)
                {
                  if(response.status != 1){
                    swal("Error!", "Usuario no encontrado!", "error");
                  }
                  if(response.rol == "escritor"){
                    
                    window.location.href = "homeEscritor.php?id_user="+response.id_user;
                    }
                      
                }
        });
      });
    });
  </script>
</body>

</html>