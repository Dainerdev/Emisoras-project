<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["progResumen.find"];    
    $u = unserialize($u); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../css/styleSearch.php">
    <script src="../../js/validaciones.js"></script>
    <title>Buscar - Programas Resumen</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ProgResumenController.php" class="form" method="post">
            <div>
                <div class="title-form">BUSCAR PROGRAMAS RESUMEN</div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" value="<?= @$u-> nombre ?>" required placeholder="Indique el nombre">
                </div>
                <div class="input-group">
                    <label for="prog">Programa base: </label>
                    <input type="text" id="prog" name="prog" value="<?= @$u-> programaid ?>">
                </div>
                <div class="input-group">
                    <label for="cons">Consorcio: </label>
                    <input type="text" id="cons" name="cons" value="<?= @$u-> consorcioid ?>">
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
                <p>1. Busca un programa resumen.</p>
            </div>
            <div class="font">
                <p>2. Edita el programa.</p>
            </div>
            <div class="font">
                <p>3. O Elimina el programa.</p>
            </div>
            <div>
                <a href="../../forms/progResumen/index.php"><input type="submit" id="volver" value="Volver"></a>
            </div>
        </div>
    </div> 
</body>
</html>
