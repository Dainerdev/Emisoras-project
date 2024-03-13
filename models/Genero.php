<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Genero extends ActiveRecord\Model{

    static $table_name = 'generos';
    static $primary_key = 'nombre';


    public static $has_many = array(
        array("Programas")
    );    #le pertenece a (uno a uno)

}