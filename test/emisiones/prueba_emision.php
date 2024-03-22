<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ResumenRealizar.php";

$u = new Emision();

$u->duracion = '02:00:00';
$u->repeticion = 'NO';
$u->fecha = '2024-03-19';
$u->horaInicio = '17:38:00';

echo $u-> duracion . " - Duracion<br>";
echo $u-> repeticion . " - Repeticion<br>";
echo $u-> fecha . " - Fecha<br>";
echo $u-> horaInicio . " - Hora de Inicio<br>";


if ($u-> horaInicio != NULL && $u-> duracion != NULL && $u-> fecha != NULL) {
        echo "NO estan null <br>";
}

try {

    $u-> save();
    $total = Emision::count();
    echo "Emision guardada exitosamente.<br>";
    echo "Total: $total Emisiones almacenadas.";

} catch (Exception $error) {
    
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") != false) {
        echo "La emision ya existe.";
        $total = Emision::count();
        echo "Total: $total Emisiones almacenadas.";

    } else {
        echo "Error al intentar guardar la emision. " . $msj;
    }
}