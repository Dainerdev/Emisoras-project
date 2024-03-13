<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";

$emi = new Emisora();
$emi-> nombre = 'Tropicana';
$emi-> frecuencia = 97.5;
$emi-> transmision_id = 'FM';

try {
    $emi-> save();
    $total = Emisora::count();
    echo "Usuario guardado exitosamente.<br>";
    echo "Total: $total Emisoras almacenadas.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") !== false) {
        echo "El usuario que intentas guardar ya existe. <br>";
        $total = Emisora::count();
        echo "Total: $total Emisoras almacenadas.";
    }else {        
        echo "Error al intentar guardar la emisora: " . $msj;
    }
}



 