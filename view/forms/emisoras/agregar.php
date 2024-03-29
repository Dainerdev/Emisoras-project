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
    <title>Agregar - Emisoras</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/EmisoraController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR EMISORAS</h3></div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="frec">Frecuencia: </label>
                    <input type="text" id="frec" name="frec" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="trans">Transmisión: </label>
                    <input type="text" id="trans" name="trans" required placeholder="AM o FM">
                </div>

                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/emisoras/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>