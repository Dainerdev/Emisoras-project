<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Consorcio extends ActiveRecord\Model{
    
    static $table_name = 'consorcios';

    public static $belongs_to = array(
        array('emisora'),
        array('productora')
    );
}