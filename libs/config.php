<?php
require_once $_SERVER["DOCUMENT_ROOT"] . 'emisoras/libs/orm/ActiveRecord.php';

 ActiveRecord\Config::initialize(function($cfg)
 {
     $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"]."emisoras/models");
     $cfg->set_connections(array(
        'development' => 'mysql://root:root@localhost/bd_emisoras'));
 });
