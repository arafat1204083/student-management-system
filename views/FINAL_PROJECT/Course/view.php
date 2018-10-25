<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;

if(!isset( $_SESSION)) session_start();
$message=Message::message();

use App\Course\Course;

$obj= new Course();


$allData= $obj->index("obj");


?>





<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>COURSE</title>
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
            <h2 style="margin:10px 8px;">Course Info</h2></div>

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
            <a href="inbox.html"><li><h5><i class="fa fa-envelope" aria-hidden="true"></i> Inbox</h5></li></a>
            <a href="slideshow.html"><li><h5><i class="fa fa-photo" aria-hidden="true"></i> Slideshow</h5></li></a>
            <a href="add links.html"><li><h5><i class="fa fa-link" aria-hidden="true"></i> Add links</h5></li></a>
            <li><h5><input type="checkbox" checked data-toggle="toggle" style="margin:3px 5px;"> Enable Advertise</h5></li></ul>
    </div>


    <!-- Main content-->
    <div class="col-xs-10 content">
        <div class="cat">
            <h3>View All Courses</h3>
            <div class="row">
                <div class="col-sm-8" style="padding-right:25px;">
                    <div class="panel-body">
                        <div class="table-responsive" >
                            </br></br></br></br>
                            <table class="table" style="color: #00a65a">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Course_ID</th>
                                    <th>Course_Name</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $serial=0;

                                    foreach($allData as $oneData){  ########### Traversing $someData is Required for pagination  #############
                                    $serial++; ?>
                                    <td><?php echo $serial?></td>
                                    <td><?php echo $oneData->course_id?></td>
                                    <td><?php echo $oneData->course_name?></td>



                                </tr>
                                <?php }?>

                                </tbody>
                            </table>


                        </div>

                    </div>





                </div>

                <!-- Showing all news titles-->

                <div class="col-sm-4 form-group" style="padding-left:15px; border-left:1px dotted #ccc;">
                    <a href="index.php" class="btn btn-info custom" role="button">Add New Courses</a>
                    <!--                    <button class="btn btn-primary pull-right" type="submit" style="margin-top:-25px; margin-bottom:15px; margin-left:10px;"></button>
                    -->                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Here is headline one<span class="label label-info">49</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href="" title="delete"> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Headline two will appear here<span class="label label-success">51</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href="" title="delete"> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">You will see headline three here<span class="label label-danger">37</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href="" title="delete"> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Wanna edit headline four <span class="label label-info">47</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Then edit headline five<span class="label label-success">43</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">You will see headline three here<span class="label label-danger">37</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Wanna edit headline four <span class="label label-info">47</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Then edit headline five<span class="label label-success">43</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Wanna edit headline four <span class="label label-info">47</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>
                    <div class="row" style="padding:20px 0px">
                        <div class="col-xs-11">
                            <a href="#news" data-toggle="modal" data-target="#news"><h4 class="cont-head">Then edit headline five<span class="label label-success">43</span></h4></a>
                        </div>
                        <div class="col-xs-1">
                            <a href=""> x </a>
                        </div>
                    </div>


                </div>
            </div>


            <!--MODAL-->
            <div id="news" class="modal fade " role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title black1">Here is headline one</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <h4>Title</h4>
                                </div>
                                <div class="col-sm-9 form-group">
                                    <input class="form-control" id="name" name="title" placeholder="Name" type="text" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <h4>Content</h4>
                                </div>
                                <div class="col-sm-9 form-group">
                                    <textarea  class="form-control" id="name" name="name" placeholder="content" type="text"  rows="10"> </textarea><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <h4>Tags</h4>
                                </div>
                                <div class="col-sm-9 form-group">
                                    <input class="form-control" id="tags" name="tags" placeholder="tags" type="text" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <h4>Select category</h4>
                                </div>
                                <div class="col-sm-9 form-group">
                                    <select name="category" style="width:100%;margin-top:10px; padding:3px 10px;">
                                        <option value="cat-1">Category 1</option>
                                        <option value="cat-2">Category 2</option>
                                        <option value="cat-3">Category 3</option>
                                        <option value="cat-4">Category 4</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <h4>Add a photo</h4>
                                </div>
                                <div class="col-sm-9 form-group">
                                    <input id="a" name="a" placeholder="Add a photo" type="file">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <button class="btn btn-primary" type="submit" style="width:100%; margin-top:15px;">Update</button>
                                </div>
                                <div class="col-xs-6">
                                    <button class="btn btn-primary" type="submit" style="width:100%; margin-top:15px;">Delete</button>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

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