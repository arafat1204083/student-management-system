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


$obj= new App\Dashboard\Dashboad();
$batch =$_REQUEST['batch'];
$obj_batch = new Batch();
$batch_name = $obj_batch->oneBatch($batch);

    $all_data= $obj->indexStudent("obj",$batch);

$obj_batch = new Batch();
$allBatch = $obj_batch->index("obj");
$running_batch = count($allBatch);
$all_std = count($obj->index("obj"));
$obj_course = new Course();
$all_course = count($obj_course->index("obj"));



######################## pagination code block#1 of 2 start ######################################

$recordCount= count($all_data);


if(isset($_REQUEST['Page']))
    $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))
    $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))
    $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))
    $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;

$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($recordCount/$itemsPerPage);


    $someData = $obj->studentPaginator($batch,$page,$itemsPerPage);


$serial = (($page-1) * $itemsPerPage) +1;

####################### pagination code block#1 of 2 end #########################################

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
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
        <!-- Site title -->
        <div class="col-xs-6">
            <h2 style="margin-left:10px; margin-top:8px">Dashboard</h2></div>

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
        <div id="confirmation_message">
            <?php echo $message;?>
        </div>
        <h3> Dashboard</h3>
        <div class="row">
            <div class="col-xs-3 text-center">
                <div class="stat-a" style=" background:#00c0ef">
                    <h2><?php echo $all_std;?></h2>
                    <h4>Total Students</h4>
                </div>
            </div>
            <div class="col-xs-3 text-center">
                <div class="stat-a" style=" background:#00a65a">
                    <h2><?php echo $running_batch;?></h2>
                    <h4>Running Batch</h4>
                </div>
            </div>
            <div class="col-xs-3 text-center">
                <div class="stat-a" style=" background:#f39c12">
                    <h2><?php echo $obj_batch->complete();?></h2>
                    <h4>Completed Batch</h4>
                </div>
            </div>
            <div class="col-xs-3 text-center">
                <div class="stat-a" style=" background:#de4b39">
                    <h2><?php echo $all_course;?></h2>
                    <h4>Total Course</h4>
                </div>
            </div>
        </div>

                    <div class="row" style="margin-top:40px;">
            <div class="col-xs-12">

                <div class="col-xs-10">
                    <h3>Batch List</h3>
                    <div class="col-sm-12">
                        <?php

                        $allBatch = $obj_batch->index("obj");
                        foreach($allBatch as $batch){
                            ?>

                            <a href="student.php?batch=<?php echo $batch->batch_id;?>&page=1"><button class="btn btn-success" ><?php echo $batch->batch_name;?></button></a>

                            <?php
                        }
                        $batchID =$_REQUEST['batch'];
                        ?>
                        <a href="pdf_full.php?batch=<?php echo $batchID ?>" class="btn btn-info" role="button">Download as PDF</a>
                        <h3>Student List</h3>
                    </div>
                    <br>

                    <?php
                    $batch_total = count($all_data);
                    echo'<h1>'.$batch_name->batch_name.'('.$batch_total.')</h1>';
                    ?>
                    <div id="put_student">
                        <table class="table">
                            <tr>
                                <th>Serial</th>
                                <th>SEIP ID</th>
                                <th>Name</th>
                                <th>Batch</th>
                                <th>Mobile No</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            <?php



                            $c = 1;
                            foreach($someData as $std){
                                $oneBatch = $obj_batch->oneBatch($std->student_info_batch_fkey);
                                ?>
                                <tr>

                                    <td><?php echo $c;?></td>
                                    <input type="hidden" value="<?php echo $std->student_info_id;?>" name="student_info_id">
                                    <td><?php echo $std->student_info_seid;?></php></td>
                                    <td><?php echo $std->student_info_name;?></php></td>
                                    <td> <?php echo $oneBatch->batch_name;?></td>
                                    <td> <?php echo $std->student_info_mobile_number;?></td>

                                    <td> <?php echo $std->student_info_email;?></td>

                                    <td>
                                        <button type="submit" class="btn btn-warning" title=""data-toggle="modal" data-target="#student_<?php echo $std->student_info_id;?>">Details</i></button>
                                        <a href="pdf.php?student_id=<?php echo $std->student_info_id;?>"><button type="submit" class="btn btn-primary" title="">Download PDF</i></button></a>

                                    </td>

                                </tr>
                                <?php
                                $c++;
                            }
                            ?>

                        </table>
                        <!--  ######################## pagination code block#2 of 2 start ###################################### -->

                        <?php
                        if($pages>1){
                            ?>
                            <div align="left" class="container">
                                <ul class="pagination">


                                    <?php
                                    $batch=$_REQUEST['batch'];

                                    $pageMinusOne = $page -1;
                                    if($page>1) echo "<li><a href='student.php?batch=$batch&Page=$pageMinusOne'>" . "Previous" . '</a></li>';
                                    //echo '<li><a href="">' . "Previous" . '</a></li>';
                                    for($i=1;$i<=$pages;$i++)
                                    {
                                        if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
                                        else  echo "<li><a href='?batch=$batch&Page=$i'>". $i . '</a></li>';

                                    }
                                    $pagePlusOne=$page+1;
                                    if($page<$pages)  echo "<li><a href='student.php?batch=$batch&Page=$pagePlusOne'>" . "Next" . '</a></li>';
                                    ?>

                                    <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                                        <?php
                                        if($itemsPerPage==3 ) echo '<option value="?batch='.$batch.'&ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                                        else echo '<option  value="?batch='.$batch.'&ItemsPerPage=3" style="float: right">Show 3 Items Per Page</option>';

                                        if($itemsPerPage==4 )  echo '<option  value="?batch='.$batch.'&ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                                        else  echo '<option  value="?batch='.$batch.'&ItemsPerPage=4" style="float: right">Show 4 Items Per Page</option>';

                                        if($itemsPerPage==5 )  echo '<option  value="?batch='.$batch.'&ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                                        else echo '<option  value="?batch='.$batch.'&ItemsPerPage=5" style="float: right">Show 5 Items Per Page</option>';

                                        if($itemsPerPage==6 )  echo '<option  value="?batch='.$batch.'&ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
                                        else echo '<option  value="?batch='.$batch.'&ItemsPerPage=6" style="float: right">Show 6 Items Per Page</option>';

                                        if($itemsPerPage==10 )   echo '<option  value="?batch='.$batch.'&ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
                                        else echo '<option  value="?batch='.$batch.'&ItemsPerPage=10" style="float: right">Show 10 Items Per Page</option>';

                                        if($itemsPerPage==15 )  echo '<option  value="?batch='.$batch.'&ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
                                        else    echo '<option  value="?batch='.$batch.'&ItemsPerPage=15" style="float: right">Show 15 Items Per Page</option>';
                                        ?>
                                    </select>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>

                        <!--  ######################## pagination code block#2 of 2 end ###################################### -->







                        <p style="margin-top:75px; float:right; color:#aaa">Developed by <a href="http://resoftbd.com/">DEADCODE_BATCH37</a></p>

                        <!--MODAL-->
                        <?php
                        foreach($someData as $std){
                            $oneBatch = $obj_batch->oneBatch($std->student_info_batch_fkey)
                            ?>
                            <div id="student_<?php echo $std->student_info_id;?>" class="modal fade " role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            <h4 class="modal-title black1" style="color:black">Here is headline one</h4>
                                        </div>
                                        <div class="modal-body" style="color:black">

                                            <div class="row">
                                                <div class="col-sm-4">

                                                </div>
                                                <div class="col-sm-4">
                                                    <img src="<?php echo $std->student_info_photo?>" class="img-thumbnail" alt="Student Photo" width="304" height="236">
                                                </div>
                                                <div class="col-sm-4">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <h4>Name</h4>
                                                </div>
                                                <div class="col-sm-9 form-group">
                                                    <h4><?php echo $std->student_info_name;?></h4>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <h4>Father's Name</h4>
                                                </div>
                                                <div class="col-sm-9 form-group">
                                                    <?php echo $std->student_info_father_name;?>     </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <h4>Mother's Name</h4>
                                                </div>
                                                <div class="col-sm-9 form-group">
                                                    <?php echo $std->student_info_mother_name;?>     </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 form-group">
                                                    <h4>Religion</h4>
                                                </div>
                                                <div class="col-sm-9 form-group">
                                                    <?php echo $std->student_info_religion;?>     </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4 form-group">
                                                    <h4>Highest Completed Class</h4>
                                                </div>
                                                <div class="col-sm-8 form-group">
                                                    <?php echo $std->student_info_highest_class_completed;?>     </div>
                                            </div>



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



                    <script>
                        $(document).ready(function(){
                            $(function() {
                                $('#confirmation_message').delay(5000).fadeOut();
                            });

                        });
                    </script>




</body>
</html>