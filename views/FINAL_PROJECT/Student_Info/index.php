<?php
require_once("../../../vendor/autoload.php");
use App\Message\Message;
use App\Batch\Batch;
use App\Course\Course;

if(!isset( $_SESSION)) session_start();
$message=Message::message();

?>


<html>
<head>

    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap-theme.css"/>
    <link rel="stylesheet" type="text/css" href="../../../resources/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../resources/css/style.css"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.uploadPreview.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../../resources/engine1/style.css" />
    <script type="text/javascript" src="../../../resources/engine1/jquery.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://code.jquery.com/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>


    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function load_time(str) {

            if (str.length == 0) {
                document.getElementById("put_time").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("put_time").innerHTML = xmlhttp.responseText;
                    }
                };
                xmlhttp.open("GET", "ajax.php?put_time=&course_id=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
<style>
    body{background:#bce8f1;
        color: #080808;font-family: 'Roboto'; overflow-x:hidden;}

    .error {color: #FF0000;}
</style>

</head>
<body>



<!-- Name Section -->
<div id="confirmation_message">
    <?php echo $message;?>
</div>
<div class="logo"><img src="../../../resources/img/bitm.jpg " height="70px"/></div>
<div class="header"><marquee>BASIS INSTITUTE OF MANAGEMENT AND TECHNOLOGY</marquee></div>

<div class="slider" >


    <!-- Start WOWSlider.com BODY section -->
    <div id="wowslider-container1">
        <div class="ws_images"><ul>
                <li><img src="../../../resources/img/1416736837.jpg" alt="1416736837" title="BITM" id="wows1_0"/></li>
                <li><img src="../../../resources/img/1416831456.jpg" alt="1416831456" title="BITM" id="wows1_1"/></li>
                <li><img src="../../../resources/img/1414060284.jpg" alt="1414060284" title="BITM" id="wows1_2"/></li>
                <li><img src="../../../resources/img/1414060833.jpg" alt="1414060833" title="BITM" id="wows1_3"/></li>
                <li><img src="../../../resources/img/1414061074.jpg" alt="1414061074" title="BITM" id="wows1_4"/></li>
                <li><img src="../../../resources/img/1415261541.jpg" alt="1415261541" title="BITM" id="wows1_5"/></li>
                <li><img src="../../../resources/img/1415261628.jpg" alt="1415261628" title="BITM" id="wows1_6"/></li>
                <li><a href="http://wowslider.com/vi"><img src="../../../resources/img/1415261721.jpg" alt="image slider"
                                                           title="BITM" id="wows1_7"/></a></li>
                <li><img src="../../../resources/img/1416736728.jpg" alt="1416736728" title="BITM" id="wows1_8"/></li>
            </ul></div>
        <div class="ws_bullets"><div>
                <a href="#" title="1416736837"><span><img src="../../../resources/img/1416736837.jpg" alt="1416736837"/>1</span></a>
                <a href="#" title="1416831456"><span><img src="../../../resources/img/1416831456.jpg" alt="1416831456"/>2</span></a>
                <a href="#" title="1414060284"><span><img src="../../../resources/img/1414060284.jpg" alt="1414060284"/>3</span></a>
                <a href="#" title="1414060833"><span><img src="../../../resources/img/1414060833.jpg" alt="1414060833"/>4</span></a>
                <a href="#" title="1414061074"><span><img src="../../../resources/img/1414061074.jpg" alt="1414061074"/>5</span></a>
                <a href="#" title="1415261541"><span><img src="../../../resources/img/1415261541.jpg" alt="1415261541"/>6</span></a>
                <a href="#" title="1415261628"><span><img src="../../../resources/img/1415261628.jpg" alt="1415261628"/>7</span></a>
                <a href="#" title="1415261721"><span><img src="../../../resources/img/1415261721.jpg" alt="1415261721"/>8</span></a>
                <a href="#" title="1416736728"><span><img src="../../../resources/img/1416736728.jpg" alt="1416736728"/>9</span></a>
            </div></div>
        <div class="ws_shadow"></div>
    </div>
    <script type="text/javascript" src="../../../resources/engine1/wowslider.js"></script>
    <script type="text/javascript" src="../../../resources/engine1/script.js"></script>

    <!-- End WOWSlider.com BODY section -->


</div>
<br>
<br>
<br>
<br>
              <!-- Start form  BODY section-->
<div class="row">

    <div class="col-md-10 col-md-offset-1">

        <form class="form-horizontal" role="form" action="store.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <br>

                <legend>SEIP Trainee Admission Form<br><span class="error"><h6>* required field.</h6></span></legend>


                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <label for="image-upload" id="image-label">Choose Your Photo</label><br>
                        <span class="error">*</span>
                        <input type="file" onchange="readURL(this);" name="student_info_photo" required>
                        <img id="blah" src="download.png" alt="your image" class="img-thumbnail" alt="Cinque Terre" width="250" height="200">

                    </div>
                    <div class="col-sm-3"></div>
                </div>
                <div class="form-group">

                    <div class="col-sm-3">

                        <input type="text" name="student_info_seid" placeholder=" YOUR SEID" class="form-control" required >
                       <span class="error">* </span>

                    </div>

                    <div class="col-sm-3">
                        <?php
                        $obj_course = new Course();
                        $allCourse = $obj_course->index("obj");
                        ?>
                        <select type="name" placeholder="Course Applied" class="form-control" onchange="load_time(this.value)" name="student_info_course_fkey" required>
                            <option>Course Applied</option>
                            <?php
                            foreach($allCourse as $data_1){
                                ?>
                                <option value="<?php echo $data_1->course_id;?>"><?php echo $data_1->course_name;?></option>
                                <?php
                            }
                            ?>

                        </select>
                       <span class="error">* </span>

                    </div>

                    <div class="col-sm-6" id="put_time">
                        <div><b> Choose Batch Time/Day: </b></div>



                    </div>
                </div>


                <br>
                <br>


                <legend>  1.Basic Information</legend>


                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" name="student_info_name" placeholder="Your Name" class="form-control" required>
                      <span class="error">*</span>

                    </div>

                </div>
                </br>
                <div class="form-group">
                    <div class="col-sm-2"> Gender </div>
                    <div class="col-sm-2"><input type="radio" name="student_info_gender" value="Male" required>Male</div>
                    <div class="col-sm-2"> <input type="radio" name="student_info_gender" value="Female">Female</div>
                    <span class="error">*</span>


                </div>
                </br>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" placeholder="National Id Number" name="student_info_national_id_number" class="form-control" required>
                       <span class="error">*</span>

                    </div>
                    <!--<div class="col-sm-4">

                        <input type="name" placeholder="Birth Registration Certificate Number" class="form-control">
                    </div>
-->
                    <div class="col-sm-6">
                        <input type="text" id="datepicker" name="student_info_date_of_birth" placeholder="Date of Birth" class="form-control">


                    </div>


                </div>
                </br>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Present Address"  name="student_info_present_address"    class="form-control">
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Permanant Address" name="student_info_permanent_address" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-8">
                        <input type="text"  name="student_info_home_district" placeholder="Home District & Upazila" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_mobile_number" placeholder="Mobile Number" class="form-control" required>
                        <span class="error">*</span>

                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="email" name="student_info_email" placeholder="Email" class="form-control" required>
                        <span class="error">* </span>

                    </div>
                </div>
                <legend>2.Personal Information</legend>
                <div class="form-group">
                    <div class="col-sm-4">
                        <select name="student_info_religion" placeholder="Religion" class="form-control">
                            <option>Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Christan">Christan</option>
                            <option value="Buddhist">Buddhist</option>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <input type="text" name="student_info_ethnic_group" placeholder="Ethnic group" class="form-control">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="student_info_education_level" placeholder="Educational Level" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_highest_class_completed" placeholder="Highest Class Completed" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_completed_year" placeholder=" Completed Year" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4"> Are You Currently Employed?  </div>
                    <div class="col-sm-2"><input type="radio" name="student_info_currently_employed" value="Yes">Yes</div>
                    <div class="col-sm-2"> <input type="radio" name="student_info_currently_employed" value="No">No</div>

                </div>

                <div class="form-group">
                    <div class="col-sm-4">  <input type="text" name="student_info_family_monthly_income" placeholder="Family's Monthly Income" class="form-control"> </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4"> Are you physically challenged?  </div>
                    <div class="col-sm-2"><input type="radio" name="student_info_physically_challenged[]" value="Yes->" required>Yes</div>
                    <div class="col-sm-2"> <input type="radio" name="student_info_physically_challenged[]" value="No">No</div>
                    <span class="error">* </span>


                </div>

                </br>
                <div class="form-group">
                    <div class="col-sm-2">If Yes-></div>
                    <div class="col-sm-2"> <input type="checkbox" name="student_info_physically_challenged[]" value="movement">Movement</div>
                    <div class="col-sm-2"> <input type="checkbox" name="student_info_physically_challenged[]" value="seeing">Seeing</div>
                    <div class="col-sm-2"> <input type="checkbox" name="student_info_physically_challenged[]" value="hearing">Hearing</div>
                    <div class="col-sm-2"> <input type="checkbox" name="student_info_physically_challenged[]" value="speech">Speech</div>
                    <div class="col-sm-2"> <input type="others" name="student_info_physically_challenged[]" placeholder="Other's" class="form-control"></div>
                </div>
                <legend>3.Family Information</legend>

                </br>
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="student_info_mother_name" placeholder="Mothers Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_mother_education_level" placeholder="Mother's Education Level" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_mother_occupation" placeholder="Mother's Occupation" class="form-control">
                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="student_info_father_name"  placeholder="Father's Name" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_father_occupation"  placeholder="Father's Occupation" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="student_info_father_annual_income"  placeholder="Fathers's Annual Income " class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4"> Does your family own home?  </div>
                    <div class="col-sm-2"><input type="radio" name="student_info_family_own_home" value="Yes">Yes</div>
                    <div class="col-sm-2"> <input type="radio" name="student_info_family_own_home" value="No">No</div>

                </div>
                <div class="form-group">
                    <div class="col-sm-4"> Does your family own land?  </div>
                    <div class="col-sm-2"><input type="radio" name="student_info_family_own_land" value="Yes">Yes</div>
                    <div class="col-sm-2"> <input type="radio" name="student_info_family_own_land" value="No">No</div>

                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" name="student_info_number_of_brother_and_sister" placeholder="Number Of Brother & Sister" class="form-control">
                    </div>
                </div>
                <br>
                <br>
                <br>




                <div class="form-group">
                    <div class="col-sm-4">
                        <button id="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </div>



            </fieldset>
        </form>
        <script>
            $(document).ready(function(){
                $(function() {
                    $('#confirmation_message').delay(5000).fadeOut();
                });

            });
        </script>
    </div>

</body>
</html>
























</body>
</html>
