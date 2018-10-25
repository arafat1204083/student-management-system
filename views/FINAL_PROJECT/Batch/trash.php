<?php

require_once("../../../vendor/autoload.php");



use App\Batch\Batch;

$obj= new Batch();


$obj->trash($_GET["id"]);



?>