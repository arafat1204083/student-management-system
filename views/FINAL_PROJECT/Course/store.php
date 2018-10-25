<?php
include_once("../../../vendor/autoload.php");
use App\Course\Course;

$obj = new Course();
$obj->setData($_POST);
$obj->store();
