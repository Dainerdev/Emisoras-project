<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";

    $msj = @$_REQUEST["msj"];
    $consorcios = @$_SESSION["consorcios.find"];    
    $consorcios = unserialize($consorcios); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styleListas.php">
    <title>Lista - Consorcios</title>
</head>
<body>
    <?php
    if (count($consorcios) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran consorcios registradas.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - CONSORCIOS</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/consorcios/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>
            
            <?php
            $consorcios = Consorcio::find('all', array('conditions' => array('emisora_id != ?', 'N/A')));
            foreach ($consorcios as $i => $p) {
            ?>
                <div>
                    <div class="card">
                        <div class="idx">
                            <p>Emisora</p>
                            <p>Productora</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> emisora_id ?></p>
                            <p><?= $p-> productora_id ?></p>
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