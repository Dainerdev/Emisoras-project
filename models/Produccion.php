<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Produccion extends ActiveRecord\Model{
    
    static $table_name = 'producciones';
    static $primary_key = 'tipo';

}