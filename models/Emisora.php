<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Emisora extends ActiveRecord\Model{
    
    public static $primary_key = "nombre";
    public static $belongs_to = array(array("Transmision"));    #le pertenece a (uno a uno)


}