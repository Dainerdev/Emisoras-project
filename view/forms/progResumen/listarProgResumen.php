<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

    $msj = @$_REQUEST["msj"];
    $progResumen = @$_SESSION["progResumen.all"];    
    $progResumen = unserialize($progResumen); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/progResumen/styleListas.php">
    <title>Lista - Programas Resumen</title>
</head>
<body>
    <?php
    if (count($progResumen) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran programas resumen registrados.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - PROGRAMAS RESUMEN</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/progResumen/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $progResumen = ProgramaResumen::find('all');
            foreach ($progResumen as $i => $p) {
            ?>
                <div class="card">
                    <div>
                        <div class="idx">
                            <p>Nombre</p>
                            <p>Programa base</p>
                            <p># Consorcio</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> nombre ?></p>
                            <p><?= $p-> programa_id ?></p>
                            <p><?= $p-> consorcio_id ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    }
    ?>    
</body>
</html>