<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class ProgramaRealizar extends ActiveRecord\Model{
    
    static $table_name = 'programaRealizar';

    public static $belongs_to = array(
        array('programa'),
        array('emision')
    );
}