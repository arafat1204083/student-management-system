<?php
include_once("../../../vendor/autoload.php");
use App\Admin;

$obj = new Admin\Admin();
$obj->setData($_POST);
$obj->store();
