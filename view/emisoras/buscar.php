<?php

    // Obtenemos el mensaje enviado por el controlador
    session_start();
    require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";

    $msj = @$_REQUEST["msj"];
    $u = @$_SESSION["emisora.find"];
    $u = unserialize($u);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar emisoras</title>
</head>
<body>
    <center>
        <h1>BUSCAR EMISORAS</h1>
        <hr>
        <!-- Formulario HTML -->
        <table>
            <tr>
                <th style="text-align: right;">Nombre: </th>
                <td><input type="text" id="nombre" name="nombre"
                value="<?= @$u-> nombre ?>" required placeholder="Indique el nombre"></td>
            </tr>
            <tr>
                <th style="text-align: right;">Frecuencia: </th>
                <td><input id="frec" name="frec" readonly
                value="<?= @$u-> frecuencia ?>"></td>
            </tr>
            <tr>
                <th style="text-align: right;">Transmisión: </th>
                <td><input type="text" id="trans" name="trans" readonly
                value="<?= @$u-> transmision_id ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;">
                    <input type="reset" id="limpiar" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="accion" name="accion" value="Buscar">
                </td>
            </tr>
        </table>
        <!-- Mostrar el mensaje enviado por el controlador -->
        <span style="color: red;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>    
</body>
</html>