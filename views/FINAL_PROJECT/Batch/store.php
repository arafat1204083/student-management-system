<?php
include_once("../../../vendor/autoload.php");
use App\Batch;

$obj = new Batch\Batch();
$obj->setData($_POST);
$obj->store();
