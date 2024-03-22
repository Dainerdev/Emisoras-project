<?php
    
    $msj = @$_REQUEST["msj"]; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/encuesta/styleAdd.php">
    <link rel="stylesheet" href="../../js/validaciones.js">
    <title>Agregar - Encuesta</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/EncuestaController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR ENCUESTAS</h3></div>
                <br> 
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="date">Fecha: </label>
                    <input type="date" id="date" name="date" required>
                </div>               
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="prog">Programa: </label>
                    <input type="text" id="prog" name="prog" required placeholder="Nombre">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="aprov">Aprovaciones: </label>
                    <input type="number" id="aprov" name="aprov" required placeholder="N° Aprovaciones">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="indif">Indiferencias: </label>
                    <input type="number" id="indif" name="indif" required placeholder="N° Indiferencias">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="rech">Rechazos: </label>
                    <input type="number" id="rech" name="rech" required placeholder="N° Rechazos">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="tEncu">Total Encuestados: </label>
                    <input type="number" id="tEncu" name="tEncu" required placeholder="Sumatoria">
                </div>

                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/encuestas/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>