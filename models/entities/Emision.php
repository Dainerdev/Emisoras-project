<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Emision extends ActiveRecord\Model{
    
    static $table_name = 'emisiones';
    
    public static $belongs_to = array(
        array('encuesta')
    );

    public static $has_many = array(
        array('programasRealizan'),
        array('resumensRealizan')
    );
}