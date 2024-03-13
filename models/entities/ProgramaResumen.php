<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class ProgramaResumen extends ActiveRecord\Model{
    
    static $table_name = 'programaresumen';
    static $primary_key = 'nombre';

    public static $belongs_to = array(
        array('consorcio'),
        array('programa')
    );

    public static $has_mamy = array(
        array('emitirResumenes'),
        array('resumenesRealizan'),
        array('personas')
    );
}