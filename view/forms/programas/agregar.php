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
    <title>Agregar - Programas</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ProgramaController.php" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR PROGRAMAS</h3></div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="gen">Género: </label>
                    <input type="text" id="gen" name="gen" required>
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="cons">Consorcio: </label>
                    <input type="text" id="cons" name="cons" required>
                </div>

                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/programas/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>

