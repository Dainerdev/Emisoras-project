<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

    $msj = @$_REQUEST["msj"];
    $productoras = @$_SESSION["productoras.find"];    
    $productoras = unserialize($productoras); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styleListas.php">
    <title>Lista - Productoras</title>
</head>
<body>
    <?php
    if (count($productoras) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran productoras registradas.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - PRODUCTORAS</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/productoras/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $productoras = Productora::find('all', array('conditions' => array('rfc != ?', '00000000-NA')));
            foreach ($productoras as $i => $p) {
            ?>
                <div>
                    <div class="card">
                        <div class="idx">
                            <p>RFC</p>
                            <p>Nombre</p>
                            <p>Teléfono</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> rfc ?></p>
                            <p><?= $p-> nombre ?></p>
                            <p><?= $p-> telefono ?></p>
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