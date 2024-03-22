<?php

$msj = @$_REQUEST["msj"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/programas/styleAdd.php">
    <link rel="stylesheet" href="../../js/validaciones.js">
    <title>Agregar - Programas Resumen</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ProgResumenController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR PROGRAMAS RESUMEN</h3></div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="prog">Programa base: </label>
                    <input type="text" id="prog" name="prog" required placeholder="Nombre">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="cons">Consorcio: </label>
                    <input type="text" id="cons" name="cons" required placeholder="ID">
                </div>

                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/progResumen/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>

