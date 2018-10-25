<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;


use App\Batch\Batch;
use App\Course\Course;
Use App\Student_Info\Student_Info;
use App\Utility\Utility;
use App\User\Auth;

$batch ="";
if(!isset( $_SESSION)) session_start();
$message=Message::message();
$batch="";
$auth= new Auth();
$status = $auth->prepare($_SESSION)->logged_in();
if(!$status) {
    Utility::redirect('../Admin/signup.php');
    return;
}

$obj= new App\Batch\Batch();
$allData= $obj->trashed("obj");



?>





<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Inactive Batch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../../../resources/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../../resources/style.css">
</head>
<body>
<div class="header">
    <div class="row">
        <!-- Title -->
        <div class="col-xs-6">
            <h2 style="margin:10px 8px;">Recovery Batch List</h2></div>
        <!--profile-->
        <div class="col-xs-11">
            <li class="dropdown pull-right">
                <a class="dropdown-toggle pro" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile
                    <span class="caret"></span></a>
                <ul class="dropdown-menu sub">

                    <a href="../Admin/addAdmin.php"><li><i class="fa fa-user-plus" aria-hidden="true"></i>Add or remove</li></a>
                    <a href="../Admin/Authentication/logout.php"><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</li></a>
                </ul>
            </li>
        </div>
        <!--Settings -->

    </div>


</div>
</div>

<!-- Sidebar -->
<div class="row container-fluid">   <div class="col-xs-2 menu">
        <div class="row menu-head">

            <div class="col-sm-8">
                <h5><?php echo $_SESSION['admin_username'];?></h5>
                <h6><i class="fa fa-circle" aria-hidden="true" style="color:#2b2; font-size:12px; padding-top:-12px;"> </i> Online</h6>
            </div>
        </div>
        <ul>
            <a href="../Dashboard/index.php"><li><h5><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</h5></li></a>
            <a href="../Course/index.php"><li><h5><i class="fa fa-list" aria-hidden="true"></i> Add Course</h5></li></a>
            <a href="../Batch/index.php"><li><h5><i class="fa fa-newspaper-o" aria-hidden="true"></i> Add Batch</h5></li></a>
            <a href="../Student_Info/aplied.php"><li><h5><i class="fa fa-envelope" aria-hidden="true"></i> Applied Students</h5></li></a>

    </div>

    <!-- Main content-->
    <div class="col-xs-10 content">
        <div class="cat">
            <h3>list</h3>
            <div class="row">
                <div class="col-sm-8" style="padding-right:25px;">



                    <div id="confirmation_message">
                        <?php echo $message;?>
                    </div>


                </div>

                <!-- Showing all news titles-->

                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-heading">
                            <h1 style="text-align: center"> Batch  List</h1>


                        </div>
                    </div>





                    <div class="panel-body">
                        <div class="table-responsive" >
                            </br></br></br></br>

                            <table class="table">

                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>BATCH_ID</th>
                                    <th>BATCH_NAME</th>
                                    <th>COURSE</th>
                                    <th>DAY</th>
                                    <th>TIME</th>

                                    <th>Action</th>

                                </tr>
                                </thead>

                                <?php
                                $count = 1;
                                echo'
                <a href="index.php"><button class="btn btn-success">Home</button></a>

                <a href="trashed.php"><button class="btn btn-warning">Closed Batch List</button></a>
               

                
                 <form action="deleteMultiple.php" method="post" class="form-group">

 <button type="submit" class="btn btn-danger">Delete Selected</button>';

                                foreach($allData as $data){
                                    if($count%2==0) $class ="info" ;
                                    else $class="success" ;
                                    echo'

                   <tr class="'.$class.'">

                       <input name="batch_id" type="hidden" value="'.$data->batch_id.'">
                       <td align="center" bgcolor="#FFFFFF"><input name="checkbox[]" type="checkbox" value="'.$data->batch_id.'"></td>

                       <td>'.$count.'</td>
                                <td>'.$data->batch_name.'</td>
                                <td>'.$data->batch_course_fkey.'</td>
                                  <td>'.$data->batch_day.'</td>
                                  <td>'.$data->batch_time.'</td>
                       <td>
                       <div class="btn-group">

                         <a href="delete.php?id='.$data->batch_id.'"><button type="button" class="btn btn-danger"> Delete</button></a>

                        </div>
                        </td>

                   </tr>
                  ';
                                    $count++;
                                }

                                ?>






                            </table>

                        </div>

                    </div>

                </div>




            </div>


            <!--MODAL-->

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