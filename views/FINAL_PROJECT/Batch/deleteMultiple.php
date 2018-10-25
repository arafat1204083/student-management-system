<?php
include_once ("../../../vendor/autoload.php");
use App\Batch\Batch;
$obj = new Batch();
$obj->deleteMultiple($_POST['mark']);
