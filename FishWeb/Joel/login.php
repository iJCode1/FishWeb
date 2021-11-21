<?php

$correo = $contraseña = $correoErr = $contraseñaErr = $Errore = $ErrorLogin = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo1 = $_POST['txtCorreo'];
    $contraseña1 = $_POST['txtContraseña'];
    if (empty($_POST["txtCorreo"])) {
        $correoErr = "* No se ingresó un correo";
        $Errore = "si";
    } else {
        $correo = filter_var($_POST["txtCorreo"], FILTER_SANITIZE_EMAIL); //Se limpia la cadena de correo

        //Despues de limpiar, ahora se valida
        if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
            $correoErr = "* El correo ingresado no tiene un formato valido";
        }
    }
    if (empty($_POST["txtContraseña"])) {
        $contraseñaErr = "* No se ingresó una contraseña";
        $Errore = "si";
    } else {
        $contraseña = verificarEntrada($_POST["txtContraseña"]);
        if (strlen($contraseña) < 4) {
            $contraseñaErr = "* La longitud de la contraseña debe ser mayor a 4 y contener al menos 1 mayuscula y 1 número";
        }
    }
    if ($correoErr == "" && $contraseñaErr == "") {
        $contraseñaHash = sha1($contraseña1);

        session_start();
        $_SESSION['correo'] = $correo;

        include './db.php';
        $consulta = "Select *from Usuarios where correo ='$correo' and contraseña = '$contraseñaHash'";

        $resultado = mysqli_query($db, $consulta);

        $filas = mysqli_num_rows($resultado);
        $dato = mysqli_fetch_array($resultado);
        echo '<h2>' . $dato['rol'] . '</h2>';

        if ($filas) {
            $_SESSION['usuario'] = $dato['usuario'];
            $_SESSION['genero'] = $dato['genero'];
            if ($dato['rol'] == "lector") {
                header("location:./lector.php");
            } else if ($dato['rol'] == "escritor") {
                header("location:./escritor.php");
            }
        } else {
            $ErrorLogin = "No se encontro ese usuario y contraseña en la BD";
            // echo '<script type="text/javascript">
            // alert("El usuario o contraseña no es correcto");
            // window.location.href="index.php";
            // </script>';
            // header("location:index.php?mensaje=No_se_puede");
            // echo 'No se hizo nada';
        }
//paquito1234
        mysqli_free_result($resultado);
        mysqli_close($db);
    }

}
function verificarEntrada($entrada)
{
    $entrada = trim($entrada);
    $entrada = stripslashes($entrada);
    $entrada = htmlspecialchars($entrada);
    return $entrada;
}
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
          <form class="form__login px-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="InputEmail1">Correo</label>
              <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                placeholder="Correo" name="txtCorreo">
                <span class="error"><?php echo $correoErr; ?></span>
            </div>
            <div class="form-group">
              <i class="fa fa-eye"></i>
              <label for="InputPassword1">Contraseña</label>
              <input type="password" class="form-control" id="InputPassword1" placeholder="Contraseña"
                name="txtContraseña">
                <span class="error"><?php echo $contraseñaErr; ?></span>
            </div>
            <p class="text-center">¿No tienes cuenta? <span><a href="./registro.php">Crear Cuenta</a></span></p>
            <button type="submit" class="btn btn-success btn-block">
              <i class="fa fa-sign-in"></i>
              Iniciar</button>
              <span class="error"><?php echo $ErrorLogin; ?></span>
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
  <script src="./js/index.js"></script>
</body>

</html>
