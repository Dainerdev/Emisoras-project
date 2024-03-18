<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Productora.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Consorcio.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/entities/Persona.php";

try {

    $lista_prod = Productora::find('all', array('conditions' => array('rfc != ?', '00000000-NA')));
    $cuenta_prod = Productora::count();
    echo "<h3><b>TOTAL PRODUCTORAS REGISTRADAS: </b>$cuenta_prod</h3><br>";
    echo "REPORTE DE PRODUCTORAS: <br>";
    echo "===================================<br>";

    foreach ($lista_prod as $i => $u) {
        echo "Productora " . ($i+1) . "<br><br>";
        echo "<b>Nombre: </b>" . $u-> nombre . "<br>";
        echo "<b>RFC: </b>" . $u-> rfc . "<br>";
        echo "<b>Telefono: </b>" . $u-> telefono . "<br>";        
        echo "--------------------------------<br>";
        echo "<br><br>";
    }

    echo "<h3>ELIMINAMOS LA PRODUCTORA DE RFC SPC941223GS1</h3><br>";

    Productora::find('SPC941223GS1')->delete();
    
    $lista_prod = Productora::all();
    $cuenta_prod = Productora::count();
    echo "<h3><b>TOTAL PRODUCTORAS REGISTRADAS: </b>$cuenta_prod</h3><br>";
    echo "NUEVO REPORTE DE PRODUCTORAS: <br>";
    echo "===================================<br>";

    foreach ($lista_prod as $i => $u) {
        echo "Productora " . ($i+1) . "<br><br>";
        echo "<b>Nombre: </b>" . $u-> nombre . "<br>";
        echo "<b>RFC: </b>" . $u-> rfc . "<br>";
        echo "<b>Telefono: </b>" . $u-> telefono . "<br>";         
        echo "--------------------------------<br>";
        echo "<br><br>";
    }

} catch (Exception $error) {
    echo $error-> getMessage();
}
