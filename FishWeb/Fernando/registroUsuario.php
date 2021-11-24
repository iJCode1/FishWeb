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
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="InputUsuario">Usuario</label>
              <input type="text" class="form-control" id="InputUsuario" aria-describedby="emailHelp"
                placeholder="Usuario" name="txtUsuario">
            </div>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="rol">Selecciona tu rol</label>
                <select name="txtRol" id="rol">
                    <option value="lector">Lector</option>
                    <option value="escritor">Escritor</option>
                </select>
            </div>
            <div class="form-group">
              <i class="fa fa-user"></i>
              <label for="genero">Selecciona tu género</label>
                <select name="txtGenero" id="genero">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
          <button type="button" class="btn btn-block btn__registrar" id="registrar_user">
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
<script src="librerias/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#registrar_user").click(function(){
        $.ajax({
            url: "insertarUsuario.php",
            type: "POST",
            data: {"correo" : $("#InputEmail1").val(),
                "contrasena" : $("#InputPassword1").val(),
                "usuario" : $("#InputUsuario").val(),
                "rol" : $("#rol").val(),
                "genero" : $("#genero").val()},
            dataType: "json",
            success: function(data){
                if(data.success = 1){
                    swal("Good job!", "You clicked the button!", "success");
                }
            }
        });
    });
</script>

</body>
</html>