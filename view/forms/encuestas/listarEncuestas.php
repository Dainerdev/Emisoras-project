<?php

    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Encuesta.php";

    $msj = @$_REQUEST["msj"];
    $encuestas = @$_SESSION["encuestas.all"];    
    $encuestas = unserialize($encuestas); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/encuesta/styleListas.php">
    <title>Lista - Encuestas</title>
</head>
<body>
    <?php
    if (count($encuestas) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran encuestas registradas.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - ENCUESTAS</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/encuestas/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $encuestas = Encuesta::find('all');
            foreach ($encuestas as $i => $p) {
            ?>
                <div class="card">
                    <div>
                        <div class="idx">
                            <p>ID</p>
                            <p>Fecha</p>
                            <p>Aprovaciones</p>
                            <p>Indiferencias</p>
                            <p>Rechazos</p>
                            <p>Programa</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> id ?></p>
                            <p><?= $fecha = date('D, d M Y', strtotime($p-> fecha)) ?></p>
                            <p><?= $p-> aprovaciones ?></p>
                            <p><?= $p-> indiferencias ?></p>
                            <p><?= $p-> rechazos ?></p>
                            <p><?= $p-> programa_id ?></p>
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