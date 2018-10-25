<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
use App\Batch\Batch;
use App\Course\Course;
use App\Student_Info\Student_Info;

if(!isset( $_SESSION)) session_start();
$message=Message::message();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Theme Resoft</title>
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
<div class="header">
    <div class="row">
        <!-- Title -->
        <div class="col-xs-6">
            <h2 style="margin:10px 8px;">Applied Students</h2></div>

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
        <div class="col-xs-10">
            <h3>Applied Student</h3>
            <p>* click Approve button to add the student to Batch</p>
            <table class="table">
                <tr>
                    <th>Serial</th>
                    <th>SEIP ID</th>
                    <th>Name</th>
                    <th>Batch</th>
                    <th>Action</th>
                </tr>
                <?php
                $obj_std = new Student_Info();
                $allStd = $obj_std->index("obj");
                $obj_batch = new Batch();
                $allBatch = $obj_batch->index("obj");
                $c = 1;
                foreach($allStd as $std){
                $oneBatch = $obj_batch->oneBatch($std->student_info_batch_fkey)
                    ?>
                    <tr>
               <form action ="approve.php" method ="post">
                        <td><?php echo $c;?></td>
                   <input type="hidden" value="<?php echo $std->student_info_id;?>" name="student_info_id">
                        <td><?php echo $std->student_info_seid;?></php></td>
                        <td><?php echo $std->student_info_name;?></php></td>
                        <td> <select name="batch_course_fkey" style="width:100%; padding:6px 10px;">
                                <option style="display:none" value="<?php echo $oneBatch->batch_id;?>"><?php echo $oneBatch->batch_name;?></option>
                                <?php
                                foreach($allBatch as $batch){
                                    ?>
                                    <option value="<?php echo $batch->batch_id;?>"><?php echo $batch->batch_name;?></option>
                                    <?php
                                }
                                ?>

                            </select></td>
                        <td>   <button type="submit" class="btn btn-success" title="Approve Student">Approve</i></button>

                        </td>
               </form>
                    </tr>
                <?php
                    $c++;
                }
                ?>

            </table>

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
</body>
</html>
