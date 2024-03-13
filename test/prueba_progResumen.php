<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";

$prog = new ProgramaResumen();
$prog-> nombre = 'Resumi2';
$prog-> programa_id = 'Noche de Luna';
$prog-> consorcio_id = '1';

try {
    $prog-> save();
    $total = ProgramaResumen::count();
    echo "Programa Resumen registrado exitosamente.<br>";
    echo "Total: $total Programas Resumen almacenados.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") !== false) {
        echo "El programa resumen que intentas guardar ya existe. <br>";
        $total = ProgramaResumen::count();
        echo "Total: $total Programas Resumen almacenados.";
    }else {        
        echo "Error al intentar guardar el programa resumen: " . $msj;
    }
    
}