<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Encuesta extends ActiveRecord\Model{
    
    static $table_name = 'encuestas';
    public $totalEncuestados;

    public static $has_many = array(
        array('programa')
    );
}