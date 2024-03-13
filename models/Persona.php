<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Persona extends ActiveRecord\Model{
    
    static $table_name = 'personas';
    static $primary_key = 'cedula';

    public static $belongs_to = array(
        array('productora'),
        array('programa'),
        array('programaResumen'),
        array('rol'),
        array('produccion')
    );
}