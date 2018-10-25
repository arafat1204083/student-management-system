<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;

$obj= new App\Batch\Batch();


if(!isset( $_SESSION)) session_start();
$message=Message::message();

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
            <h2 style="margin:10px 8px;">Closed Batch List</h2></div>

        <!-- Profile -->
        <div class="col-xs-6">
            <div class="col-xs-11">
                <li class="dropdown pull-right">
                    <a class="dropdown-toggle pro" data-toggle="dropdown" href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu sub">
                        <a href="edit profile.html"><li><i class="fa fa-user" aria-hidden="true"></i>Edit Profile</li></a>
                        <a href="add admin.html"><li><i class="fa fa-user-plus" aria-hidden="true"></i>Add or remove</li></a>
                        <a href=""><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</li></a>
                    </ul>
                </li></div>

            <!-- Settings -->



        </div>
    </div>
</div>

<!-- Side bar -->
<div class="row container-fluid">
    <div class="col-xs-2 menu">
        <div class="row menu-head">
            <div class="col-sm-4">
                <img src="img/pro.jpg" class="img-circle img-responsive" style="padding-left:10px;">
            </div>
            <div class="col-sm-8">
                <h5>Admin Picture</h5>
                <h6><i class="fa fa-circle" aria-hidden="true" style="color:#2b2; font-size:12px; padding-top:-12px;"> </i> Online</h6>
            </div>
        </div>
        <ul>
            <a href="admin.html"><li><h5><i class="fa fa-bar-chart" aria-hidden="true"></i> Dashboard</h5></li></a>
            <a href="category.html"><li><h5><i class="fa fa-list" aria-hidden="true"></i> Category</h5></li></a>
            <a href="index.php"><li><h5><i class="fa fa-newspaper-o" aria-hidden="true"></i> COURSE INFO</h5></li></a>
            <a href="trashed.php"><li><h5><i class="fa fa-envelope" aria-hidden="true"></i> Inactive Batch</h5></li></a>
            <a href="slideshow.html"><li><h5><i class="fa fa-photo" aria-hidden="true"></i> Slideshow</h5></li></a>
            <a href="add links.html"><li><h5><i class="fa fa-link" aria-hidden="true"></i> Add links</h5></li></a>
            <li><h5><input type="checkbox" checked data-toggle="toggle" style="margin:3px 5px;"> Enable Advertise</h5></li></ul>
    </div>


    <!-- Main content-->
    <div class="col-xs-10 content">

        <div id="confirmation_message">
            <?php echo $message;?>
        </div>

        <div class="cat">
            <h3>list</h3>
            <div class="row">
                <div class="col-sm-8" style="padding-right:25px;">




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

                                <?php
                                $obj = new App\Batch\Batch();
                                $allData = $obj->trashed("obj");
                                ?>

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
                                echo '
          <!--<a href="index.php"><button class="btn btn-success">Home</button></a>-->
          <a href="multipleDelete.php"><button class="btn btn-danger">Delete</button></a>

 <form action="recover.php" method="post" class="form-group">
 <button type="submit" class="btn btn-info">Recover Selected</button>';

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

                         <a href="recover.php?id='.$data->batch_id.'"><button type="button" class="btn btn-success">Recover</button></a>

                        </div>
                        </td>

                   </tr>
                     </form> ';

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