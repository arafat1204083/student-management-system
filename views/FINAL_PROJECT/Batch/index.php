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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Batch Info</title>
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
        <!--Site title-->
        <div class="col-xs-6">
            <h2 style="margin-left:10px; margin-top:8px">Batch Info</h2></div>
        <div class="col-xs-6">
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


    <!-- Main content -->
    <?php
    $obj_course =new Course();
    $allCourse= $obj_course->index("obj");
    $obj = new Batch();
    $allBatch = $obj->index("obj");
    ?>

    <div class="col-xs-10 content">
        <div class="cat">
            <div id="confirmation_message">
                <?php echo $message;?>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h3>Batch</h3>
                    <p class="notice category-h">*** Admin must add new Batch as the course name....</p>

                    <div class="container-fluid">
                        <form class="form-horizontal" role="form" action="store.php" method="post">
                            <div class="form-group">
                                <h3 class="category-h">Batch name:</h3>
                                <input type="text" class="form-control" id="add-cat"  name="batch_name" placeholder="Add a new batch" >
                                <h3 class="category-h">Select Course</h3>
                                <select name="batch_course_fkey" style="width:100%; padding:6px 10px;">
                                    <option value="">none</option>
                                    <?php
                                    foreach($allCourse as $value_course){
                                        ?>
                                        <option value="<?php echo $value_course->course_id;?>"><?php echo $value_course->course_name;?></option>
                                    <?php
                                    }
                                    ?>

                                </select><br>
                                <h3 class="category-h">Select Day</h3>
                                <div class="radio">
                                    <label><input type="radio" name="batch_day" value="Sat-Mon-Wed">Sat-Mon-Wed</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="batch_day" value="Sun-Tues-Thurs">Sun-Tues-Thurs</label>
                                </div>
                                <h3 class="category-h">Select Time</h3>
                                <select name="batch_time" style="width:100%; padding:6px 10px;">
                                    <option value="">none</option>
                                    <option value="9AM-1PM">9AM-1PM</option>
                                    <option value="1:30PM-5:30PM">1:30PM-5:30PM</option>
                                    <option value="5:30PM-9:30PM">5:30PM-9:30PM</option>


                                </select><br>
                                <button type="submit" class="btn btn-primary category-h" title="add category">INSERT NEW BATCH</button>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-sm-8" style="padding-left:100px; padding-right: 50px; margin-top:40px;">

                    <a href="multipleDelete.php"><button class="btn btn-danger">Multiple Delete</button></a>
                    <a href="multipleTrash.php"><button class="btn btn-danger">Multiple Close</button></a>
                    <a href="trashed.php"><button class="btn btn-success">Closed Batch</button></a>
                    <h3 style="margin-top:30px;">Existing Batch</h3>

                    <br>
                    <h3></h3>
                    <?php
                    foreach($allBatch as $data){

                    ?>
                        <div class="form-group row cat">
                            <div class="col-sm-2">
                                <h4><?php echo $data->batch_name;?></h4>
                            </div>
                            <div class="col-sm-3">

                            </div>

                            <div class="col-sm-6 btn-group">

                                <button  class="btn btn-warning" title="edit" data-toggle="modal" data-target="#batch_<?php echo $data->batch_id;?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <a href="delete.php?id=<?php echo $data->batch_id;?>"> <button type="submit" class="btn btn-danger" title="remove"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </a>


                            <a href="trash.php?id=<?php echo $data->batch_id;?>"> <button type="submit" class="btn btn-primary" title="Close Batch">Close</i></button>
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
    </div>

    <!--MODAL-->
    <?php
    foreach($allBatch as $data) {
       $data->batch_course_fkey;
        $one = $obj_course->oneCourse($data->batch_course_fkey);

        ?>

        <div id="batch_<?php echo $data->batch_id;?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content cat">
                    <div class="modal-header" style="color:#111;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Batch name</h4>
                    </div>
                    <form action="update.php" method="post">
                    <div class="modal-body" style="color:#111;">
                        <h3 class="category-h">Batch name:</h3>
                        <input type="hidden" name="batch_id" value="<?php echo $data->batch_id;?>" class="form-control" id="add-cat" placeholder="Add a category">

                        <input type="text" name="batch_name" value="<?php echo $data->batch_name;?>" class="form-control" id="add-cat" placeholder="Add a category">

                        <h3 class="category-h">Select Course</h3>
                        <select name="batch_course_fkey" style="width:100%; padding:6px 10px;">
                            <option value="<?php echo $one->course_id;?>"><?php echo $one->course_name;?></option>
                            <?php
                            foreach($allCourse as $value_course){
                                ?>
                                <option value="<?php echo $value_course->course_id;?>"><?php echo $value_course->course_name;?></option>
                                <?php
                            }
                            ?>

                        </select><br>
                        <h3 class="category-h">Select Day</h3>
                        <div class="radio">
                            <label><input type="radio" name="batch_day" value="Sat-Mon-Wed" <?php if($data->batch_day=="Sat-Mon-Wed"):?>checked<?php endif ?>>Sat-Mon-Wed</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="batch_day" value="Sun-Tues-Thurs" <?php if($data->batch_day=="Sun-Tues-Thurs"):?>checked<?php endif ?>>Sun-Tues-Thurs</label>
                        </div>
                        <h3 class="category-h">Select Time</h3>
                        <select name="batch_time" style="width:100%; padding:6px 10px;">
                            <option value="<?php echo $data->batch_time;?>"><?php echo$data->batch_time;?></option>
                            <option value="9AM-1PM">9AM-1PM</option>
                            <option value="1:30PM-5:30PM">1:30PM-5:30PM</option>
                            <option value="5:30PM-9:30PM">5:30PM-9:30PM</option>


                        </select><br>
                        <button type="submit" class="btn btn-primary category-h" title="add category">Update
                        </button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
</form>
            </div>
        </div>
        <?php
    }
    ?>
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