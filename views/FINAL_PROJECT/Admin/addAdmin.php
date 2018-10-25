<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
use App\Admin\Admin;


if(!isset( $_SESSION)) session_start();
$message=Message::message();

?>





<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Admin Page</title>
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
            <h2 style="margin-left:10px; margin-top:8px">Admin</h2></div>

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

    <!-- Main COntents-->


    <?php
    $obj_admin =new Admin();
    $allAdmin= $obj_admin->index("obj");

    ?>


    <div class="col-xs-10 content">
        <div class="cat">
            <div id="confirmation_message">
                <?php echo $message;?>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <h3>Admin</h3>
                    <div class="container-fluid">
                        <form class="form-horizontal" role="form" action="store.php" method="post">
                            <div class="form-group">
                                <h3 class="category-h">Admin name:</h3>
                                <input type="text" class="form-control" id="add-cat"  name="admin_name" placeholder="Add a new admin" >

                                <h3 class="category-h">Username</h3>
                                <input type="text" class="form-control" id="add-cat"  name="admin_username" placeholder="Add a new username" >


                                <h3 class="category-h">Enter Password</h3>
                                <input type="password" class="form-control" id="add-cat"  name="admin_password" placeholder="Password" >

                                 <h3 class="category-h">Email</h3>
                                <input type="email" class="form-control" id="add-cat"  name="admin_email" placeholder="Add a new email" >


                                <button type="submit" class="btn btn-primary category-h" title="add category">INSERT NEW ADMIN</button>
                            </div>
                        </form>


                    </div>
                </div>
                <div class="col-sm-8" style="padding-left:100px; padding-right: 50px; margin-top:40px;">

                    <h3 style="margin-top:30px;">Existing Admins</h3>

                    <?php
                    foreach($allAdmin as $data){

                        ?>
                        <div class="form-group row cat">
                            <div class="col-sm-6">
                                <h4><?php echo $data->admin_name;?></h4>
                            </div>


                            <div class="col-sm-6 btn-group">

                                <button  class="btn btn-warning" title="edit" data-toggle="modal" data-target="#admin_<?php echo $data->admin_id;?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                <a href="delete.php?id=<?php echo $data->admin_id;?>"> <button type="submit" class="btn btn-danger" title="remove"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </a>



                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>







                <p class="notice category-h">* Hover over the buttons and hold for one or two seconds in order to know the functionalities of that button.</p>
            </div>
        </div>
    </div>
    </div>


<!--MODAL-->
<?php
foreach($allAdmin as $data) {
   /* echo $data->batch_course_fkey;
    $one = $obj_course->oneCourse($data->batch_course_fkey);*/

    ?>

    <div id="admin_<?php echo $data->admin_id;?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content cat">
                <div class="modal-header" style="color:#111;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Admin name</h4>
                </div>
                <form action="update.php" method="post">
                    <div class="modal-body" style="color:#111;">
                        <h3 class="category-h">Admin name:</h3>
                        <input type="hidden" name="admin_id" value="<?php echo $data->admin_id;?>" class="form-control" id="add-cat" placeholder="Add a category"></br>

                        <input type="text" name="admin_name" value="<?php echo $data->admin_name;?>" class="form-control" id="add-cat" placeholder="Name"></br>

                        <input type="text" name="admin_username" value="<?php echo $data->admin_username;?>" class="form-control" id="add-cat" placeholder="Username"></br>

                        <input required ="required" type="text" name="admin_password" " class="form-control" id="add-cat" placeholder="Change Password"></br>

                        <input type="text" name="admin_email" value="<?php echo $data->admin_email;?>" class="form-control" id="add-cat" placeholder="Email"></br>



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