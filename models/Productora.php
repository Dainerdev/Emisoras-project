<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Productora extends ActiveRecord\Model{
    
    static $table_name = 'productoras';
    static $primary_key = 'rfc';

    public static $belongs_to = array(
        array('consorcio')
    );

    public static $has_many = array(
        array('personas')
    );
}