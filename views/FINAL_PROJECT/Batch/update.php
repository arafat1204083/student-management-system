<?php
require_once("../../../vendor/autoload.php");



use App\Batch\Batch;

$obj= new Batch();
$obj->setData($_POST);
$obj->update();


