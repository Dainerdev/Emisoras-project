<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";

    $msj = @$_REQUEST["msj"];
    $emisoras = @$_REQUEST["emisoras.all"];
    $emisoras = unserialize($emisoras);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styleListas.php">
    <title>Lista - Emisoras</title>
</head>
<body>
    <?php
    if (count($emisoras) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran emisoras registradas.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - EMISORAS</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/emisoras/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $emisoras = Emisora::find('all', array('conditions' => array('nombre != ?', 'N/A')));
            foreach ($emisoras as $i => $p) {
            ?>
                <div class="card">
                    <div>
                        <div class="idx">
                            <p>Nombre</p>
                            <p>Frecuencia</p>
                            <p>Transmisión</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> nombre ?></p>
                            <p><?= $p-> frecuencia ?></p>
                            <p><?= $p-> transmision_id ?></p>
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