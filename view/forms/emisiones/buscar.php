<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emision.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["emision.find"];    
    $u = unserialize($u);    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../css//emision/styleSearch.php">
    <script src="../../js/validaciones.js"></script>
    <title>Buscar - Emisiones</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/EmisionController.php" class="form" method="post">
        <div>
                <div class="title-form">BUSCAR EMISIONES</div>
                <br>
                <div class="input-group" id="hour">
                    <b style="color: red;">* </b>
                    <label for="ini">Hora de Inicio: </label>
                    <input type="time" id="ini" name="ini" step="1" required>
                </div>
                <div class="input-group"  id="lapse">
                    <b style="color: red;">* </b>
                    <label for="durac">Duración: </label>
                    <input type="time" id="durac" name="durac" step="1" required>
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
                <input type="submit" id="buscar" value="Buscar">
                <div>
                    <input type="submit" id="editar" value="Editar">
                    <input type="submit" id="eliminar" value="Eliminar">
                </div>
            </div>
        </form>
        <div class="line"></div>
        <div class="alert">
            <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
        </div>
        <div class="steps-group">
            <div class="font">
                <p>1. Busca una emisión.</p>
            </div>
            <div class="font">
                <p>2. Edita la emisión.</p>
            </div>
            <div class="font">
                <p>3. O Elimina la emisión.</p>
            </div>
            <div>
                <a href="../../forms/emisiones/index.php"><input type="submit" id="volver" value="Volver"></a>
            </div>
        </div>
    </div>
</body>
</html>



