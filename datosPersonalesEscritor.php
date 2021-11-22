<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Escritor</title>
    <link rel="stylesheet" href="librerias/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="registrarse">
                    <div class="text-center">
                        <h1>Registro de escritor</h1>
                    </div>
                    
                    <form action="InsertarEscritor.php" method="POST">
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input required name="Nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">                            
                        </div>
                        <div class="form-group">
                            <label for="apPat">Apellido Paterno</label>
                            <input required name="apPat" type="text" class="form-control" id="apPat" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group">
                            <label for="apMat">Apellido Materno</label>
                            <input required name="apMat" type="text" class="form-control" id="apMat" placeholder="Apellido Materno">
                        </div>
                        <div class="form-group">
                            <label for="RFC">RFC</label>
                            <input required name="RFC" type="text" class="form-control" id="RFC" placeholder="RFC">
                        </div>
                        <div class="form-group">
                            <label for="Edad">Edad</label>
                            <input required name="Edad" type="text" class="form-control" id="Edad" placeholder="Edad">
                        </div>
                        <div class="form-group">
                            <label for="Direccion">Dirección</label>
                            <input required name="Direccion" type="text" class="form-control" id="Direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group">
                            <label for="Telefono">Teléfono</label>
                            <input required name="Telefono" type="text" class="form-control" id="Telefono" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <label for="RefArt">Referencias de articulos</label>
                            <input required name="RefArt" type="text" class="form-control" id="RefArt" placeholder="Referencias de articulos">
                        </div>
                        <div class="form-check">
                            <input name="terminos" type="checkbox" class="form-check-input" id="terminos" required>
                            <label class="form-check-label" for="terminos">Marca la casilla si estas de acuerdo con nuestros <a target="_blank" href="TerminosYCond.php">Terminos y condiciónes</a></label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <script src="librerias/jquery.min.js"></script>
    <script src="librerias/popper.min.js"></script>
    <script src="librerias/bootstrap.min.js"></script>
    <script src="scripts/validar.js"></script>
</body>
</html>