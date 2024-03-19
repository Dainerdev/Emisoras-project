<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["emisora.find"];    
    $u = unserialize($u);    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../css/styleSearch.php">
    <script src="../../js/validaciones.js"></script>
    <title>Buscar - Emisoras</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/EmisoraController.php" class="form" method="post">
            <div>
                <div class="title-form">BUSCAR EMISORAS</div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" value="<?= @$u-> nombre ?>" required placeholder="Indique el Nombre">
                </div>
                <div class="input-group">
                    <label for="frec">Frecuencia: </label>
                    <input type="text" id="frec" name="frec" value="<?= @$u-> frecuencia ?>">
                </div>
                <div class="input-group">
                    <label for="trans">Transmisión: </label>
                    <input type="text" id="trans" name="trans" value="<?= @$u-> transmision_id ?>">
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
                <p>1. Busca una emisora.</p>
            </div>
            <div class="font">
                <p>2. Edita la emisora.</p>
            </div>
            <div class="font">
                <p>3. O Elimina la emisora.</p>
            </div>
            <div>
                <a href="../../forms/emisoras/index.php"><input type="submit" id="volver" value="Volver"></a>
            </div>
        </div>
    </div> 
</body>
</html>