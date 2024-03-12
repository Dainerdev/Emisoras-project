<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Programa extends ActiveRecord\Model{

    static $table_name = 'programas';
    static $primary_key = 'nombre';

    public static $belongs_to = array(array("Genero"));    #le pertenece a (uno a uno)

}