<?php
include_once("../../../vendor/autoload.php");
use App\Dashboard;

$obj = new Dashboard\Dashboad();
$obj->setData($_POST);
$obj->store();
