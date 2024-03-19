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
    <title>Agregar - Consorcios</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ConsorcioController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR CONSORCIOS</h3></div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="emi">Emisora: </label>
                    <input type="text" id="emi" name="emi" required placeholder="Nombre">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="produ">Productora: </label>
                    <input type="text" id="produ" name="produ" required placeholder="RFC">
                </div>
                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/consorcios/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>

