<!DOCTYPE html>
<html lang="es">
<?php
session_start();
$idArt = $_GET['id_art'];
$idUser = $_GET['idUser'];
$_SESSION['id_art'] = $idArt;
$_SESSION['idUser'] = $idUser;

include 'db.php';
$query = "SELECT * from articulo where idArticulo = " . $idArt;

$select = mysqli_query($db,$query);

while($datos = mysqli_fetch_array($select)){
    $categoria = $datos['categoria'];
    $titulo = $datos['titulo'];
    $articulo = $datos['articulo'];
}     

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
    <h1>Editar articulo<hr></h1>
    </div>
    <div>
    <div class="container text-center">      
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
        <button id="btn_guardar" class="btn btn-success" style="width: 100%; margin-top: 30px;" type="button" data-toggle="modal" data-target="#publicar">Guardar</button> 
        </div>
        <div class="col-3">    
                     
        </div>
      </div>

      <div class="form-group">
              <label for="titulo"><strong>Titulo del articulo: <hr></strong> </label>
              <input <?php echo "value= '" . $titulo . "'";?> required name="titulo" type="text" class="form-control" id="titulo">                         
          </div>
          <div class="form-group">
              <label for="textarea"><strong>Contenido: <hr></strong> </label>
              <textarea name="textarea" style="padding: 30px; width: 95%; margin: 0 auto;" class="form-control rounded-0" id="textarea" rows="30"><?php echo $articulo;?> </textarea>                            
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
      $(document).ready(function(){
        $("#publicar_now").click(function(){

        var datosArticulo = {         
        "fecha" : $("#fecha").val(),
        "categoria" : $("#categoria").val(),
        "titulo" : $("#titulo").val(),
        "articulo" : $("#textarea").val(),
        "publicado" : "N"
        };

        $.ajax({
            type: "POST",
            url: 'editarArticulo.php',
            data: datosArticulo,
            dataType: "json",
            success: function(response)
                {
                    swal("Exito!", "Articulo editado correctamente!", "success");
                    window.location.href = "homeEscritor.php?id_user="+response.idUser;
                    
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
        <p>¿Estas seguro que deseas guardar el articulo?, si lo guardas ahora solopodras modificarlo desde el panel de control</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="publicar_now" type="button" class="btn btn-success" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>


</body>

</html>