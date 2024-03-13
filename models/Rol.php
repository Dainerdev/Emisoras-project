<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Rol extends ActiveRecord\Model{
    
    static $table_name = 'roles';
    static $primary_key = 'nombre';

    public static $has_many = array(
        array('personas')
    );
}