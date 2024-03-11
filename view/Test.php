<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/models/Emisora.php";

$emi = new Emisora();
$emi-> nombre = "Radio Tiempo";
$emi-> frecuencia = strval(88.5);
$emi-> transmision = $nombre;

$emi-> save();

$total = Emisora::count();
echo "Total: $total Emisoras";



 