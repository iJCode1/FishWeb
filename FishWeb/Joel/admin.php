<?php
require 'db.php';
session_start();

$genero = $_SESSION["genero"];
$usuario = $_SESSION["usuario"];
$nombre1 = $_POST["txtNombre"];
$carrera1 = $_POST["txtCarrera"];
$numero1 = $_POST["txtNumero"];
$foto1 = $_POST["fotografia"];
$imagen = '';
$nameRegExp = array("options" => array("regexp" => "/[a-zA-Z\s]+/"));
$nombre = $carrera = $numero = $nameErr = $carreraErr = $numeroErr = $Errore = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["txtNombre"])) {
        $nameErr = "* No se ingresó un nombre";
        $Errore = "si";
    } else {
        $nombre = verificarEntrada($_POST["txtNombre"]);
        //Validar ahora
        if (!filter_var($nombre, FILTER_VALIDATE_REGEXP, $nameRegExp)) {
            $nameErr = "* Nombre no válido, solo se admiten letras";
            $Errore = "si";
        }
    }
    if (empty($_POST["txtCarrera"])) {
        $carreraErr = "* No se ingresó un nombre de carrera";
        $Errore = "si";
    } else {
        $carrera = verificarEntrada($_POST["txtCarrera"]);
    }
    if (empty($_POST["txtNumero"])) {
        $numeroErr = "* No se ingresó un número de control";
        $Errore = "si";
    } else {
        $numero = verificarEntrada($_POST["txtNumero"]);
        if (strlen($numero) < 8) {
            $numeroErr = "* La longitud del número de control debe ser de 8 números";
        }
    }
    if ($nameErr == "" && $carreraErr == "" && $numeroErr == "") {
        // $id = $_GET['id_corredor'];
        // $sentencia = "INSERT INTO Usuarios(correo,contraseña,usuario,rol,genero) VALUES('$correo','".sha1($contraseña)."','$usuario','$rol1','$genero1')";

        // if (mysqli_query($db, $sentencia)) {
        //     header('Location: login.php?mensaje=registrado');
        // } else {
        //   header('Location: registro.php?mensaje=no_registrado');
        // }

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
            $query = mysqli_query($db, "INSERT INTO Nosotros(nombre,carrera,numero_control,foto) VALUES('$nombre1','$carrera1','$numero1','$imagen')");
            header('Location: nosotrosAdmin.php?registrado');
        }
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
                    <a class="nav-link nav__item text-white" href="./admin.php">
                    <i class="fa fa-home fa-icon nav__item"></i>
                    Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active nav__item text-center">
                    <a class="nav-link nav__item text-white" href="./nosotrosAdmin.php">
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
                    <li class="nav-item active text-center mx-2 nav__item">
                    <a class="nav-link text-white nav__item">
                    <i class="fa fa-user fa-icon nav__item"></i>
    <?php
if ($genero != "") {
    if ($genero == "M") {
        echo "Bienvenida  " . $usuario;
    } else if($genero == "H") {
        echo "Bienvenido  " . $usuario;
    }
    ?><?php
}?>
                </a>
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
    <div>
        <main class="form__login--wrapper">
            <h2 class="text-center mt-5">Registrar Alumno</h2>
            <div class="card mt-4">
                <div class="card-body">
                <h3 class="text-white text-center py-1 login__title">
                    <i class="fa fa-users"></i>
                    Nosotros</h3>
                <form class="form__login px-4" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                    <i class="fa fa-text-width"></i>
                    <label for="InputNombre">Nombre</label>
                    <input type="text" class="form-control" id="InputNombre" aria-describedby="emailHelp"
                        placeholder="Juanito" name="txtNombre">
                        <span class="error"><?php echo $nameErr; ?></span>
                    </div>
                    <div class="form-group">
                    <i class="fa fa-graduation-cap"></i>
                    <label for="InputCarrera">Carrera</label>
                    <input type="text" class="form-control" id="InputCarrera" placeholder="Ing. Sistemas Computacionales"
                        name="txtCarrera">
                        <span class="error"><?php echo $carreraErr; ?></span>
                    </div>
                    <div class="form-group">
                    <i class="fa fa-hashtag"></i>
                    <label for="InputNumero">Numero de Control</label>
                    <input type="number" class="form-control" id="InputNumero" placeholder="20280253"
                        name="txtNumero">
                        <span class="error"><?php echo $numeroErr; ?></span>
                    </div>
                    <div class="form-group">
                    <i class="fa fa-picture-o"></i>
                    <label for="InputFotografia">Fotografía</label>
                    <input type="file"  id="InputFotografia" placeholder="Contraseña"
                        name="fotografia">
                        <span class="error"><?php echo $fotografiaErr; ?></span>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                    <i class="fa fa-sign-in"></i>
                    Registrar</button>
                    <span class="error"><?php echo $ErrorLogin; ?></span>
                </form>
                </div>
            </div>
        </main>
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
