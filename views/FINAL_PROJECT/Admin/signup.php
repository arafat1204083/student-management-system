<?php
require_once("../../../vendor/autoload.php");

use App\Message\Message;

if(!isset( $_SESSION)) session_start();
$message=Message::message();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../../resources/style.css">
</head>
<body>
<div class="row">
    <div class="col-xs-4">

    </div>
    <div class="col-xs-4 content" style="margin-top:160px; height:270px; border-radius:7px; overflow:hidden;">
        <h3>BITM Admission</h3>
        <div id="confirmation_message">
            <?php

            echo $message;?>
        </div>
        <form role="form" action="Authentication/login.php" method="post" class="login-form">
        <div class="row" style="margin:15px;">
            <div class="col-xs-3">
                <h4>Username:</h4>
            </div>
            <div class="col-xs-9">
                <input class="form-control" name="admin_username" placeholder="Username" type="text" required>
            </div>
        </div>
        <div class="row" style="margin:15px;">
            <div class="col-xs-3">
                <h4>Password:</h4>
            </div>
            <div class="col-xs-9">
                <input class="form-control" id="pass" name="admin_password" placeholder="Password" type="password" required>
            </div>
        </div>
        <button class="btn btn-primary pull-right" style="margin:15px;">Log in</button><br>
        <p class="notice"> Forgot password? <a href="admin.html"> Click here. </a>
    </div>
    <div class="col-xs-4">
</form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(function() {
            $('#confirmation_message').delay(5000).fadeOut();
        });

    });
</script>
</body>
</html>