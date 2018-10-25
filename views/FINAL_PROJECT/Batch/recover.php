<?php

require_once("../../../vendor/autoload.php");



use App\Batch\Batch;

$obj= new Batch();
$obj->setData($_POST);


if(isset($_GET['id']))
    $obj->recover($_GET['id']);
else
    $obj->mulRecover();



?>







