<?php
include_once("../../../vendor/autoload.php");
use App\Batch\Batch;

$obj = new Batch();

if(isset($_GET['put_time'])){
    $id = $_GET['course_id'];
    $obj->get_time($id);
}

