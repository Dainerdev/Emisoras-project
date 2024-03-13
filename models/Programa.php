<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Programa extends ActiveRecord\Model{

    static $table_name = 'programas';
    static $primary_key = 'nombre';

    public static $belongs_to = array(
        array('Genero'),
        array('consorcio')
    );    #le pertenece a (uno a uno)

    public static $has_many = array(
        array('programasResumenes', 'class_name' => 'ProgramaResumen'),
        array('programasRealizan', 'class_name' => 'ProgramaRealizar'),
        array('emitirProgramas'),
        array('personas')
    );
}