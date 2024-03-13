<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Persona extends ActiveRecord\Model{
    
    static $table_name = 'personas';
    static $primary_key = 'cedula';
    public $progResumen_id;

    public static $belongs_to = array(
        array('productora'),
        array('rol'),
        array('produccion'),
        array('programa', 'class_name' => 'Programa'),        
        array('progResumen' , 'class_name' => 'ProgramaResumen', 'foreign_key' => 'progResumen_id')
    );
   
}