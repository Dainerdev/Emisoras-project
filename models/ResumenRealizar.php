<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class ResumenRealizar extends ActiveRecord\Model{
    
    static $table_name = 'resumenRealizar';

    public static $belongs_to = array(
        array('programaResumen'),
        array('emision')
    );
}