<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "emisoras/libs/config.php";

class Emision extends ActiveRecord\Model{ 

    public static $has_many = array(
        array('programaRealizar'),
        array('resumenRealizar')
    );
}