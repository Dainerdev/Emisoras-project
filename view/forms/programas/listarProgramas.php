<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Genero.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";

    $msj = @$_REQUEST["msj"];
    $programas = @$_SESSION["programas.all"];    
    $programas = unserialize($programas); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styleListas.php">
    <title>Lista - Programas</title>
</head>
<body>
    <?php
    if (count($programas) <= 0) {
    ?>
        <span style="color: #900D40; background-color: #FAD7CE; padding: 5px; border-radius: 4px;">
            No se encuentran programas registrados.
        </span>
        <?php
        } 
    else{
    ?>
        <div class="container">
            <div class="head">
                <h1 class="title">LISTA - PROGRAMAS</h1>
                <div class="line"></div>
                <div>
                    <a href="../../forms/programas/index.php"><input type="hidden" id="volver">
                    <img id="back" src="../../img/back.png"></a> 
                </div>
            </div>

            <?php
            $programas = Programa::find('all');
            foreach ($programas as $i => $p) {
            ?>
                <div class="card">
                    <div>
                        <div class="idx">
                            <p>Nombre</p>
                            <p>Género</p>
                            <p># Consorcio</p>
                        </div>
                        <div class="info">
                            <p><?= $p-> nombre ?></p>
                            <p><?= $p-> genero_id ?></p>
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