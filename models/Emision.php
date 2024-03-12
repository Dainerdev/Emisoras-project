<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Emision extends ActiveRecord\Model{
    
    static $table_name = 'emisiones';
}