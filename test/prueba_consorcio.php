<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";

$cons = new Consorcio();
$cons-> emisora_id = 'La Mega';
$cons-> productora_id = '901023456-2';

try {
    $cons-> save();
    $total = Consorcio::count();
    echo "Consorcio registrado exitosamente.<br>";
    echo "Total: $total Consorcios almacenados.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") !== false) {
        echo "El consorcio que intentas guardar ya existe. <br>";
        $total = Consorcio::count();
        echo "Total: $total Consorcios almacenados.";
    }else {        
        echo "Error al intentar guardar el consorcio: " . $msj;
    }
    
}