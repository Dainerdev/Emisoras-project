<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Genero.php";

$prog = new Programa();
$prog-> nombre = 'Noche de Luna';
$prog-> genero_id = 'Musical';
$prog-> consorcio_id = '1';

try {
    $prog-> save();
    $total = Programa::count();
    echo "Programa registrado exitosamente.<br>";
    echo "Total: $total Programas almacenados.";

} catch (Exception $error) {
    $msj = $error-> getMessage();
    if (strstr($msj, "Duplicate") !== false) {
        echo "El programa que intentas guardar ya existe. <br>";
        $total = Programa::count();
        echo "Total: $total Programas almacenados.";
    }else {        
        echo "Error al intentar guardar el programa: " . $msj;
    }
    
}