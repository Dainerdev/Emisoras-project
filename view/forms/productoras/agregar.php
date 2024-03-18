<?php

$msj = @$_REQUEST["msj"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styleAdd.php">
    <link rel="stylesheet" href="../../js/validaciones.js">
    <title>Agregar - Productoras</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ProductoraController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR PRODUCTORAS</h3></div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="rfc">RFC: </label>
                    <input type="text" id="rfc" name="rfc" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="tel">Teléfono: </label>
                    <input type="text" id="tel" name="tel">
                </div>

                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>

