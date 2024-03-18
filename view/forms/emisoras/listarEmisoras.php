<?php
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
    <title>Lista de las Emisoras</title>
    <script src="../../js/validaciones.js"></script>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <center>
        <h1>REPORTE DE EMISORAS</h1>
        <hr>
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
            <fieldset style="width: 70%;">
                <legend>Información de las Emisoras:</legend>
                <table>
                    <!-- Fila para las columnas -->
                    <tr>
                        <th>Nombre</th>
                        <th>Frecuencia</th>
                        <th>Transmisión</th>
                    </tr>
                    <?php
                    $emisoras = Emisora::find('all', array('conditions' => array('nombre != ?', 'N/A')));
                    foreach ($emisoras as $i => $e) {
                    ?>
                        <!-- Fila por cada emisora (tr) -->
                        <tr style="text-align: left;">
                            <!-- Celda para cada dato de una emisora (td) -->
                            <td><?= $e-> nombre ?></td>
                            <td><?= $e-> frecuencia ?></td>
                            <td><?= $e-> transmision_id ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </fieldset>
        <?php
        }
        ?>

        <span style="color: red; padding: 5px; border-radius: 4px;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>
</body>
</html>