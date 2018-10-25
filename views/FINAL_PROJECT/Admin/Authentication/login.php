<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\User\Auth;
use App\Message\Message;
use App\Utility\Utility;


$auth= new Auth();
$status= $auth->prepare($_POST)->is_registered();

if($status){
    $_SESSION['admin_username']=$_POST['admin_username'];
    Message::message("
                <div class=\"alert alert-success\">
                            <strong>Welcome!</strong> You have successfully logged in.
                </div>");
    
    return Utility::redirect('../../Dashboard/index.php');

}else{
    Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Wrong information!</strong> Please try again.
                </div>");

    return Utility::redirect('../signup.php');

}


