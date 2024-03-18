<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["productora.find"];    
    $u = unserialize($u); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="../../css/styleSearch.php">
    <script src="../../js/validaciones.js"></script>
    <title>Buscar - Productoras</title>
</head>
<body>
    <div class="container-form">
        <form action="../../../controllers/ProductoraController.php" class="form" method="post">
            <div>
                <div class="title-form">BUSCAR PRODUCTORAS</div>
                <br>
                <div class="input-group">
                    <b style="color: red;">* </b>
                    <label for="rfc">RFC: </label>
                    <input type="text" id="rfc" name="rfc" value="<?= @$u-> rfc ?>" required placeholder="Indique el RFC">
                </div>
                <div class="input-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombre" name="nombre" value="<?= @$u-> nombre ?>">
                </div>
                <div class="input-group">
                    <label for="tel">Teléfono: </label>
                    <input type="text" id="tel" name="tel" value="<?= @$u-> telefono ?>">
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
                <p>1. Busca una productora.</p>
            </div>
            <div class="font">
                <p>2. Edita la productora.</p>
            </div>
            <div class="font">
                <p>3. O Elimina la productora.</p>
            </div>
        </div>
    </div> 
</body>
</html>
