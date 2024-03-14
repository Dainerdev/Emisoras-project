<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";


$nombre = 'Tropicana';

try {
    $emi = Emisora::find($nombre);
    echo "<b>Nombre: </b>" . $emi-> nombre . "<br>";
    echo "<b>Frecuencia: </b>" . $emi-> frecuencia . "<br>";
    echo "<b>Transmision: </b>" . $emi-> transmision_id . "<br>";
} catch (Exception $error) {
    echo $error-> getMessage();
}