<?php

require_once("../../../vendor/autoload.php");



use App\Batch\Batch;

$obj= new Batch();


$obj->delete($_GET["id"]);



?>