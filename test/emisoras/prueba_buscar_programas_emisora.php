<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Genero.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaRealizar.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";

$nombre = 'noche de Luna';

try {

    $prog = Programa::find($nombre);
    echo "<b>Nombre: </b>" . $prog-> nombre . "<br>";
    echo "<b>Género: </b>" . $prog-> genero_id . "<br>";

    $cons = $prog-> consorcio;
    echo "----------------------------------------<br>";
    echo "Consorcio:<br>";    
    echo "<b>Productora: </b>" . $cons-> productora_id. "<br>";
    
    $emi = $cons-> emisora;
    echo "<b>Nombre: </b>" . $emi-> nombre . "<br>";
    echo "<b>Frecuencia: </b>" . $emi-> frecuencia . "<br>";
    echo "<b>Transmision: </b>" . $emi-> transmision_id . "<br>";    
    echo "----------------------------------------<br>";

} catch (Exception $error) {
    echo $error-> getMessage();
}

