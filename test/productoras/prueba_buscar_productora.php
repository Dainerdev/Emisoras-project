<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

$rfc = 'SPC941223GS1';

try {
    $prod = Productora::find($rfc);
    echo "<b>RFC: </b>" . $prod-> rfc . "<br>";
    echo "<b>Nombre: </b>" . $prod-> nombre . "<br>";
    echo "<b>Telefono: </b>" . $prod-> telefono . "<br>";

} catch (Exception $error) {
    
    echo $error-> getMessage();
}

