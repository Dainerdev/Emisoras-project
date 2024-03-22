<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emision.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

    $msj = @$_REQUEST["msj"];
    $emisiones = @$_SESSION["emisiones.all"];    
    $emisiones = unserialize($emisiones); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/emision/styleListas.php">
    <title>Lista - Emisiones</title>
</head>
<body>
    <?php
    if (count($emisiones) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran emisiones registradas.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - EMISIONES</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/emisiones/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $emisiones = Emision::find('all');
            foreach ($emisiones as $i => $p) {
            ?>
                <div class="card">
                    <div>
                        <div class="idx">
                            <p>ID</p>
                            <p>Fecha</p>
                            <p>Duración</p>
                            <p>Repetición</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> id ?></p>
                            <p><?= $fecha = date('D, d M Y', strtotime($p-> fecha)) ?></p>
                            <p><?= $p-> duracion ?></p>
                            <p><?= $p-> repeticion ?></p>
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