<?php
require_once("../../../vendor/autoload.php");



use App\Admin\Admin;

$obj= new Admin();
$obj->setData($_POST);
$obj->update();


