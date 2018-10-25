<?php
include_once("../../../vendor/autoload.php");
use App\Student_Info\Student_Info;

$obj = new Student_Info();
$obj->setData($_POST);
$obj->store();
