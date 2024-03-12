<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Transmision extends ActiveRecord\Model{
    
    static $table_name = 'transmisiones';    //indicamos el nombre de la tabla
    static $primary_key = 'nombre';         //establecemos nombre como PK ya que no se llama "id"

    // Relación uno a muchos con la clase Emisora
    public static $has_many = array(
        array('emisoras', 'class_name' => 'Emisora', 'foreign_key' => 'transmision_id')
    );



}