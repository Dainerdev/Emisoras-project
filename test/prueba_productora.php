<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";

$prod = new Productora();
$prod-> rfc = '901023456-2';
$prod-> nombre = 'La Voz de la Tierra Producciones Ltda.';
$prod-> telefono = '4 222 33 44';

try {
    $prod-> save();
    $total = Productora::count();
    echo "Productora registrada exitosamente.<br>";
    echo "Total: $total Productora almacenadas.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") !== false) {
        echo "La productora que intentas guardar ya existe. <br>";
        $total = Productora::count();
        echo "Total: $total Productora almacenadas.";
    }else {        
        echo "Error al intentar guardar la productora: " . $msj;
    }
    
}