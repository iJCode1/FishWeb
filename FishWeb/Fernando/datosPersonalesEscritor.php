<!DOCTYPE html>
<html lang="en">
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
  <div class="container-fluid">
    <div class="jumbotron">
    <div class="jumbo__partone">
        <h1 class="display-4 text-white text-center font-weight-bold">FishWeb</h1>
      </div>
    </div>
    <div class="card mt-4">
      <div class="card-body">
        <h3 class="text-white text-center py-1">
          Datos personales del escritor</h3>
        <form class="form__login px-4" method="post" id="formulario_esc">
        
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input required name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">                            
                    </div>                    
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="apPat">Apellido Paterno</label>
                        <input required name="apPat" type="text" class="form-control" id="apPat" placeholder="Apellido Paterno">
                    </div>                    
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="apMat">Apellido Materno</label>
                        <input required name="apMat" type="text" class="form-control" id="apMat" placeholder="Apellido Materno">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="RFC">RFC</label>
                        <input required name="RFC" type="text" class="form-control" id="RFC" placeholder="RFC">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="Edad">Edad</label>
                        <input required name="Edad" type="text" class="form-control" id="Edad" placeholder="Edad">
                    </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input required name="Telefono" type="text" class="form-control" id="Telefono" placeholder="Teléfono">
                    </div>
                </div>
                
            </div>
            
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input required name="Direccion" type="text" class="form-control" id="Direccion" placeholder="Dirección">
            </div>
            <div class="row">           
                <div class="col-6">
                    <div class="form-group">
                        <label for="categoria">Temas de interes</label>
                        <select class="form-control" id="categoria">
                            <option value="Canas">Cañas de pescar</option>
                            <option value="Anzuelos">Anzuelos de pezca</option>
                            <option value="Pescados">Pescados exóticos</option>
                            <option value="Lugares">Lugares en México para pescar</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="RefArt">Referencias de articulos</label>
                        <input required name="RefArt" type="text" class="form-control" id="RefArt" placeholder="Referencias de articulos">
                    </div>
                </div>
            </div>
            <div class="form-check">
                <input name="terminos" type="checkbox" class="form-check-input" id="terminos" required>
                <label class="form-check-label" for="terminos">Marca la casilla si estas de acuerdo con nuestros <a target="_blank" href="TerminosYCond.php">Terminos y condiciónes</a></label>
            </div>
          <button type="button" id="registrar_esc" class="btn btn-block btn__registrar">
            <i class="fa fa-check-circle-o"></i>
            Registrarse</button>
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
        $("#registrar_esc").click(function(e){      
            var parametros = {
                "nombre" : $("#Nombre").val(),
                "apPat" : $("#apPat").val(),
                "apMat" : $("#apMat").val(),
                "RFC" : $("#RFC").val(),
                "Edad" : $("#Edad").val(),
                "Telefono" : $("#Telefono").val(),
                "Direccion" : $("#Direccion").val(),
                "RefArt" : $("#RefArt").val(),
                "categoria" : $("#categoria").val()
        };
        $.ajax({
            type: "POST",
            url: 'InsertarEscritor.php',
            data: parametros,
            success: function(response)
                {
                    swal("Exito!", "datos insertados correctamente!", "success");
                }
        });
            
        });
    });
</script>

</body>
</html>