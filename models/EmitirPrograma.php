<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class EmitirPrograma extends ActiveRecord\Model{
    
    static $table_name = 'emitirPrograma';

    public static $belongs_to = array(
        array('programa'),
        array('emisora')
    );
}