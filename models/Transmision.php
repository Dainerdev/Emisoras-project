<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Transmision extends ActiveRecord\Model{
    
    public static $primary_key = "nombre";
    public static $has_many = array(array("Emisoras"), array("Frecuencia"));    #le pertenece a (uno a uno)



}