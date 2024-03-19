<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["consorcio.find"];    
    $u = unserialize($u); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../css/styleSearch.php">
    <script src="../../js/validaciones.js"></script>
    <title>Buscar - Consorcios</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ConsorcioController.php" class="form" method="post">
            <div>
                <div class="title-form">BUSCAR CONSORCIOS</div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="emi">Emisora: </label>
                    <input type="text" id="emi" name="emi" value="<?= @$u-> emisora_id ?>" required placeholder="Nombre">
                </div>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="produ">Productora: </label>
                    <input type="text" id="produ" name="produ" value="<?= @$u-> productora_id ?>" required placeholder="RFC">
                </div>
                <input type="button" id="limpiar" name="accion" value="Limpiar" onclick="cleanForm()">
                <input type="submit" id="buscar" name="accion" value="Buscar">
                <div>
                    <input type="submit" id="editar" name="accion" value="Editar">
                    <input type="submit" id="eliminar" name="accion" value="Eliminar">
                </div>
            </div>
        </form>
        <div class="line"></div>
        <div class="alert">
            <span><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
        </div>
        <div class="steps-group">
            <div class="font">
                <p>1. Busca el Consorcio.</p>
            </div>
            <div class="font">
                <p>2. Edita el Consorcio.</p>
            </div>
            <div class="font">
                <p>3. O Elimina el Consorcio.</p>
            </div>
            <div>
                <a href="../../forms/consorcios/index.php"><input type="submit" id="volver" value="Volver"></a>
            </div>
        </div>
    </div> 
</body>
</html>
