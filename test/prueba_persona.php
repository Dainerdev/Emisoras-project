<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Produccion.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Rol.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Programa.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/ProgramaResumen.php";

$per = new Persona();
$per-> nombre = "Maria Alejandra Gomez Martinez";
$per-> cedula = '1008765432';
$per-> productora_id = '901023456-2';
$per-> rol_id = 'Conductor';
$per-> produccion_id = 'N/A';
$per-> programa_id = 'Noche de Luna';
$per-> progResumen_id = 1;

if ($per != "") {

    echo "<b>Nombre: </b>" . $per-> nombre . "<br>";
    echo "<b>Cedula: </b>" . $per-> cedula . "<br>";
    echo "<b>Productora: </b>" . $per-> productora_id . "<br>";
    echo "<b>Rol: </b>" . $per-> rol_id . "<br>";
    echo "<b>Produccion: </b>" . $per-> produccion_id . "<br>";
    echo "<b>Programa: </b>" . $per-> programa_id . "<br>";
    echo"<b>Programa Resumen: </b>" . $per-> progResumen_id . "<br>";
    $per-> save();
        $total = Persona::count();
        echo "Persona registrada exitosamente.<br>";
        echo "Total: $total Personas almacenadas.";

    echo "Error: Debe proporcionar un nombre para la persona.";
    exit;
}else {
    try {    
    
        $per-> save();
        $total = Persona::count();
        echo "Persona registrada exitosamente.<br>";
        echo "Total: $total Personas almacenadas.";
    
    } catch (Exception $error) {
        $msj = $error-> getMessage();
        if (strstr($msj, "Duplicate") !== false) {
            echo "La persona que intentas guardar ya existe. <br>";
            $total = Persona::count();
            echo "Total: $total Personas almacenadas.";
        }else {        
            echo "Error al intentar guardar la persona: " . $msj;
        }
        
    }
}


