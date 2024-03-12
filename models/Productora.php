<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Productora extends ActiveRecord\Model{
    
    static $table_name = 'productoras';
    static $primary_key = 'rfc';
}