<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class ProgramaResumen extends ActiveRecord\Model{
    
    static $table_name = 'programaresumen';

    static $belongs_to = array(
        array('consorcio', 'foreign_key' => 'consorcio_id'),
        array('programa', 'foreign_key' => 'programa_id')
    );

    static $has_many = array(
        array('emitirResumenes'),
        array('resumenesRealizan'),
        array('personas', 'class_name' => 'Persona', 'foreign_key' => 'progResumen_id')
    );
}