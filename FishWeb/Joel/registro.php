<?php
include 'db.php';
$correo = $contraseña = $usuario = $rol = $genero = $correoErr = $contraseñaErr = $usuarioErr = $rolErr = $generoErr = $Errore = "";
$correo1 = $_POST['txtCorreo'];
$contraseña1 = $_POST['txtContraseña'];
$usuario1 = $_POST['txtUsuario'];
$rol1 = $_POST['txtRol'];
$genero1 = $_POST['txtGenero'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (empty($_POST["txtUsuario"])) {
        $usuarioErr = "* No se ingresó un usuario";
        $Errore = "si";
    } else {
        $usuario = verificarEntrada($_POST["txtUsuario"]);
        if (strlen($usuario) < 6) {
            $usuarioErr = "* La longitud de la contraseña debe ser mayor a 6 y contener letras y números";
        }
    }
    if ($correoErr == "" && $contraseñaErr == "" && $usuarioErr == "") {
        // $id = $_GET['id_corredor'];
        //$sentencia = "INSERT INTO Usuarios(correo,contraseña,usuario,rol,genero) VALUES('$correo','".sha1($contraseña)."','$usuario','$rol1','$genero1')";

        // if (mysqli_query($db, $sentencia)) {
        //     header('Location: login.php?mensaje=registrado');
        // } else {
        //   header('Location: registro.php?mensaje=no_registrado');
        // }
        if ($rol1 == "lector") {
          header("location:./terminosLector.php");
      } else if ($rol1 == "escritor") {
          header("location:./terminosEscritor.php");
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
  <title>FishWeb - Registrarse</title>
</head>
<body>
  <div class="container-fluid">
    <div class="jumbotron">
    <div class="jumbo__partone">
        <h1 class="display-4 text-white text-center font-weight-bold">FishWeb</h1>
      </div>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <h3 class="text-white text-center py-1">
          Alta de Usuarios</h3>
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
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="InputUsuario">Usuario</label>
              <input type="text" class="form-control" id="InputUsuario" aria-describedby="emailHelp"
                placeholder="Usuario" name="txtUsuario">
                <span class="error"><?php echo $usuarioErr; ?></span>
            </div>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="rol">Selecciona tu rol</label>
                <select name="txtRol" id="rol">
                    <option value="lector">Lector</option>
                    <option value="escritor">Escritor</option>
                </select>
                <span class="error"><?php echo $rolErr; ?></span>
            </div>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="genero">Selecciona tu género</label>
                <select name="txtGenero" id="genero">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
                <span class="error"><?php echo $rolErr; ?></span>
            </div>
          <button type="submit" class="btn btn-block btn__registrar">
            <i class="fa fa-check-circle-o"></i>
            Continuar</button>
          <a href="index.php" class="btn btn-block btn__regresar">
            <i class="fa fa-arrow-left"></i>
            Regresar</a>
        </form>
      </div>
    </div>
  </div>
<footer class="fixed-bottom">
    <p>FishWeb</p>
</footer>
</body>
</html>