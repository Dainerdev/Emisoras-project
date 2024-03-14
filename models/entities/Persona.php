<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Persona extends ActiveRecord\Model{
    
    static $table_name = 'personas';
    static $primary_key = 'cedula';

    static $belongs_to = array(
        array('productora', 'foreign_key' => 'productora_id'),
        array('rol', 'foreign_key' => 'rol_id'),
        array('produccion', 'foreign_key' => 'produccion_id'),
        array('programa', 'class_name' => 'Programa', 'foreign_key' => 'programa_id'),        
        array('progResumen' , 'class_name' => 'ProgramaResumen', 'foreign_key' => 'progResumen_id')
    );
   
}