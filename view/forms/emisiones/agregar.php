<?php

$msj = @$_REQUEST["msj"]; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/emision/styleAdd.php">
    <link rel="stylesheet" href="../../js/validaciones.js">
    <title>Agregar - Emision</title>
</head>
<body>
    <div class="container-form">
        <form action="" class="form" method="post">
            <div>
                <div class="title-form"><h3>AGREGAR EMISIONES</h3></div>
                <br>                
                <div class="input-group" id="hour">
                    <b style="color: red;">* </b>
                    <label for="ini">Hora de Inicio: </label>
                    <input type="time" id="ini" name="ini" required>
                </div>
                <div class="input-group"  id="lapse">
                    <b style="color: red;">* </b>
                    <label for="durac">Duración: </label>
                    <input type="time" id="durac" name="durac" required>
                </div>
                <div class="input-group" id="repet">
                    <b style="color: red;">* </b>
                    <label for="repe">Repetición: </label>
                    <input type="text" id="repe" name="repe" required placeholder="SI / NO">
                    </div>
                <div class="input-group" id="fecha">
                    <b style="color: red;">* </b>
                    <label for="date">Fecha: </label>
                    <input type="date" id="date" name="date" required>
                </div>

                <div class="line"></div>
                <input type="reset" id="limpiar" value="Limpiar">
                <input type="submit" id="accion" name="accion" value="Guardar">
                <a href="../../forms/productoras/index.php"><input type="button" id="volver" value="Volver"></a>
            </div>
            <div class="line"></div>
            <div class="alert">
                <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
            </div>
        </form>        
    </div>
</body>
</html>

