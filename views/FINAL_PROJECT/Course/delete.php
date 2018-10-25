<?php

require_once("../../../vendor/autoload.php");



use App\Course\Course;

$obj= new Course();


$obj->delete($_GET["id"]);



?>