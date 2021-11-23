
<!DOCTYPE html>
<html lang="es">
<?php
  include "db.php";
  setlocale(LC_ALL,"es_ES");
  $idUsuario = 8;

  $consultar = "SELECT * FROM escritor WHERE idUsuario= $idUsuario";

  $resultado = mysqli_query($db, $consultar) or die("Error al buscar registros");

  while($datos = mysqli_fetch_array($resultado)){
      $nombre = $datos['nombre'];
      $apPat = $datos['apPat'];
      $apMat = $datos['apMat'];
      $idEscritor = $datos['idEscritor'];
  }

  session_start();
  $_SESSION['idEsc'] = $idEscritor;

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
    </div>
    <div class="text-center">
    <h1>Escribir articulo<hr></h1>
    </div>
    <div>
    <div class="container text-center">
      <div class="row">
        <div class="col-12">
        <p style="font-size: 25px;"><STrong>AUTOR</STrong></p>
        </div>
      </div>
      <div class="row">
        
        <div class="col-4">
        <div class="form-group">
        <label for="Nombre_escritor">Nombre</label>
        <input required name="Nombre_escritor" type="text" class="form-control" id="Nombre_escritor" <?php echo "value = '" . $nombre . "'"?> disabled>                            
    </div>
    
        </div>
        <div class="col-4">
        
    <div class="form-group">
        <label for="Nombre_apellidoP">Apellido Paterno</label>
        <input required name="Nombre_apellidoP" type="text" class="form-control" id="Nombre_apellidoP" <?php echo "value = '" . $apPat . "'"?> disabled>                            
    </div>
        </div>
        <div class="col-4">
        
    <div class="form-group">
        <label for="Nombre_apellidoM">Ampellido Materno</label>
        <input required name="Nombre_apellidoM" type="text" class="form-control" id="Nombre_apellidoM" <?php echo "value = '" . $apMat . "'"?> disabled>                            
    </div>
        </div>
      
      </div>
      <div class="row">
        <div class="col-3">
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input required name="fecha" type="text" class="form-control" id="fecha" <?php echo "value = '" . date('d')-1 . "-" . date('m') . "-" . date('Y') . "'"?> disabled>                            
        </div>
        </div>
        <div class="col-3">
        <div class="form-group">
          <label for="categoria">Temas de interes: </label>
            <select class="form-control" id="categoria">
              <option value="Canas">Cañas de pescar</option>
              <option value="Anzuelos">Anzuelos de pezca</option>
              <option value="Pescados">Pescados exóticos</option>
              <option value="Lugares">Lugares en México para pescar</option>
            </select>
        </div>
        </div>
        <div class="col-3">        
        <button id="btn_guardar" class="btn btn-success" style="width: 100%; margin-top: 30px;">Guardar</button> 
        </div>
        <div class="col-3">    
          <!-- Button trigger modal -->
          <button id="btn_publicar" class="btn btn-primary" style="width: 100%; margin-top: 30px;" type="button" data-toggle="modal" data-target="#publicar">
            Publicar
          </button>             
        </div>
      </div>

      <div class="form-group">
              <label for="titulo"><strong>Titulo del articulo: <hr></strong> </label>
              <input required name="titulo" type="text" class="form-control" id="titulo">                            
          </div>
          <div class="form-group">
              <label for="textarea"><strong>Contenido: <hr></strong> </label>
              <textarea name="textarea" style="padding: 30px; width: 95%; margin: 0 auto;" class="form-control rounded-0" id="textarea" rows="30"></textarea>                            
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

<script>
  $(document).ready(function(){
    $("#btn_guardar").hide();
      $("#btn_guardar").click(function(){
        var datosArticulo = {
          "autor" : $("#Nombre_escritor").val() + " " + $("#Nombre_apellidoP").val() + " " + $("#Nombre_apellidoM").val(),
          "fecha" : $("#fecha").val(),
          "categoria" : $("#categoria").val(),
          "titulo" : $("#titulo").val(),
          "articulo" : $("#textarea").val(),
          "publicado" : "N"
        };

        $.ajax({
            type: "POST",
            url: 'crearArticulo.php',
            data: datosArticulo,
            success: function(response)
                {
                    alert("articulo creado correctamente");
                      
                }
        });
       
      });

      $("#publicar_now").click(function(){

        $("#btn_guardar").hide();

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
                    alert("articulo Publicado correctamente");
                      
                }
        });
      });
      
  });
</script>



<!-- Modal -->
<div class="modal fade" id="publicar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Estas seguro que deseas publicar tu articulo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="publicar_now" type="button" class="btn btn-primary" data-dismiss="modal">Publicar</button>
      </div>
    </div>
  </div>
</div>


</body>

</html>