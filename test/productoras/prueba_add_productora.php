<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

$prod = new Productora();

$prod-> rfc = 'SPC941223GS1';
$prod-> nombre = 'Sinergia Audiovisual';
$prod -> telefono = '923 765 489';

try {
    $prod-> save();
    $total = Productora::count();
    echo "Productora registrada exitosamente.<br>";
    echo "Total: $total Productoras almacenadas.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") != false) {
        echo "La productora que intentas guardar ya existe. <br>";
        $total = Productora::count();
        echo "Total: $total Productoras almacenadas.";
    }else {        
        echo "Error al intentar guardar la productora: " . $msj;
    }
}