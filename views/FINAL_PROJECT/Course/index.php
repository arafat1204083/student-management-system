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

                        <a href="../Admin/addAdmin.php"><li><i class="fa fa-user-plus" aria-hidden="true"></i>Add or remove</li></a>
                        <a href="../Admin/Authentication/logout.php"><li><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</li></a>
                    </ul>
                </li></div>


        </div>

    </div>
</div>

<!-- Side bar -->
<div class="row container-fluid">
    <div class="col-xs-2 menu">
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
            <div id="confirmation_message">
                <?php echo $message;?>
            </div>
            <h3>Add New Course</h3>
            <div class="row">
                <div class="col-sm-8" style="padding-right:25px;">
                    <form accept-charset="UTF-8" role="form" class="form-course" method="Post" action="store.php">
                      <div class="row">
                          <div class="col-sm-9 form-group">
                            <input class="form-control" id="name" name="course_name" placeholder="Add a new course" type="text" required>
                           </div>

                      </div>

                        <div class="row">
                          <button class="btn btn-primary pull-right" type="submit" style=" margin-top:15px;"> Insert to Add </button>
                       </div>

                    </form>

                    </div>

                </div>



               <!-- show all-->


                <div class="col-sm-8" style="padding-left:100px; padding-right: 50px; margin-top:40px;">
                    <h3 style="margin-top:30px;">All Existing Courses</h3>
                    <?php
                    foreach($allData as $data) {
                        ?>

                        <div class="form-group row cat">
                            <div class="col-sm-4">
                                <h4><?php echo $data->course_name;?></h4>
                            </div>

                            <div class="col-sm-5 btn-group">
                                <button type="submit" class="btn btn-warning" title="edit" data-toggle="modal"
                                        data-target="#course_<?php echo $data->course_id?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <a href="delete.php?id=<?php echo $data->course_id?>" Onclick="return ConfirmDelete()" type="submit" class="btn btn-danger" title="remove"><i class="fa fa-times"
                                                                                               aria-hidden="true"></i>
                                </a>
                            </div>

                        </div>

                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


            <!--MODAL-->

                <?php
                foreach($allData as $data) {
                    ?>

                    <div id="course_<?php echo $data->course_id ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content cat">
                                <div class="modal-header" style="color:#111;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <form action="update.php" method="post">
                                    <h4 class="modal-title">Course</h4>
                                </div>
                                <div class="modal-body" style="color:#111;">
                                    <h3 class="category-h">Course name:</h3>
                                    <input type="hidden" value="<?php echo $data->course_id ?>" name="course_id">
                                    <input type="text" name="course_name" class="form-control" id="add-cat" placeholder="Add a category" value="<?php echo $data->course_name;?>">

                                    <button class="btn btn-primary category-h" title="add category" type="submit">
                                        Update
                                  </button>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
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