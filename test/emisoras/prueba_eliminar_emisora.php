<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Transmision.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Emisora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirPrograma.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/EmitirResumen.php";

try {

    $lista_emisoras = Emisora::all();
    $cuenta_emisoras = Emisora::count();
    echo "<h3><b>TOTAL EMISORAS REGISTRADAS: </b>$cuenta_emisoras</h3><br>";
    echo "REPORTE DE EMISORAS: <br>";
    echo "===================================<br>";

    foreach ($lista_emisoras as $i => $u) {
        echo "EMISORA " . ($i+1) . "<br><br>";
        echo "<b>Nombre: </b>" . $u-> nombre . "<br>";
        echo "<b>Frecuencia: </b>" . $u-> frecuencia . "<br>";
        echo "<b>Transmision: </b>" . $u-> transmision_id . "<br>";        
        echo "--------------------------------<br>";
        echo "<br><br>";
    }

    echo "<h3>ELIMINAMOS LA EMISORA LLAMADA TROPICANA</h3><br>";

    Emisora::find('tropicana')->delete();
    
    $lista_emisoras = Emisora::all();
    $cuenta_emisoras = Emisora::count();
    echo "<h3><b>TOTAL EMISORAS REGISTRADAS: </b>$cuenta_emisoras</h3><br>";
    echo "NUEVO REPORTE DE EMISORAS: <br>";
    echo "===================================<br>";

    foreach ($lista_emisoras as $i => $u) {
        echo "EMISORA " . ($i+1) . "<br><br>";
        echo "<b>Nombre: </b>" . $u-> nombre . "<br>";
        echo "<b>Frecuencia: </b>" . $u-> frecuencia . "<br>";
        echo "<b>Transmision: </b>" . $u-> transmision_id . "<br>";        
        echo "--------------------------------<br>";
        echo "<br><br>";
    }

} catch (Exception $error) {
    echo $error-> getMessage();
}