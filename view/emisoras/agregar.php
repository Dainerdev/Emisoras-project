<?php

$msj = @$_REQUEST["msj"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar emisoras</title>
</head>
<body>    
    <center>
        <h1>AGREGAR USUARIOS</h1>
        <hr>
        <!-- FORMULARIO HTML -->
        <form action="../../controllers/EmisoraController.php" method="POST">
            <table>
                <tr>
                    <th style="text-align: right">Nombre </th>
                    <td><input type="text" id="nombre" name="nombre" required placeholder="Nombre de emisora"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Frecuencia </th>
                    <td><input id="frec" name="frec" required placeholder="Frecuencia Hz"></td>
                </tr>
                <tr>
                    <th style="text-align: right">Transmision </th>
                    <td><input type="text" id="trans" name="trans" required placeholder="Indique AM o FM"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <input type="reset" id="limpiar" value="Limpiar">&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="submit" id="accion" name="accion" value="Guardar">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Mostrar el mensaje enviado por el controlador -->
        <span style="color: red;"><?= ($msj != NULL || isset($msj)) ? $msj : "" ?></span>
    </center>
</body>
</html>