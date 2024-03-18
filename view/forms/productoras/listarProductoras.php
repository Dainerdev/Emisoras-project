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
    <link rel="stylesheet" href="">
    <title>Lista - Productoras</title>
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
            <h1 class="title">LISTA - PRODUCTORAS</h1>
            <div class="line"></div>

            <?php
            $productoras = Productora::find('all', array('conditions' => array('rfc != ?', '00000000-NA')));
            foreach ($productoras as $i => $p) {
            ?>
                <div class="card">
                    <div class="productora">
                        <div class="idx">
                            <p>RFC</p>
                            <p>Nombre</p>
                            <p>Teléfono</p>
                        </div>
                        <div class="info">
                            <p><?= $e-> rfc ?></p>
                            <p><?= $e-> nombre ?></p>
                            <p><?= $e-> telefono ?></p>
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