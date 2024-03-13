<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Emisora extends ActiveRecord\Model{
    
    static $table_name = 'emisoras';
    static $primary_key = 'nombre';


    // Relación muchos a uno con la clase Transmision
    public static $belongs_to = array(
        array('transmision', 'class_name' => 'Transmision'),
        array('consorcio')
    );

    // Relación uno a muchos con la clase EmitirPrograma
    public static $has_many = array(
        array('emitirProgramas'),
        array('emitirResumenes', 'class_name' => 'EmitirResumen')
    );

}