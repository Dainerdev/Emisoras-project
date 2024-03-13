<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class EmitirResumen extends ActiveRecord\Model{
    
    static $table_name = 'emitirResumen';

    public static $belongs_to = array(
        array('programaResumen'),
        array('emisora')
    );
}