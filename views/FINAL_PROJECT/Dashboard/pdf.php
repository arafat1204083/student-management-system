
<?php
include_once ('../../../vendor/autoload.php');
use App\Dashboard\Dashboad;
use App\Course\Course;
use App\Batch\Batch;

$obj= new Dashboad();

echo $id = $_REQUEST['student_id'];
$recordSet=$obj->single_pdf($id);
//var_dump($allData);
$trs="";
$sl=0;




foreach($recordSet as $row) {
    $obj_batch = new Batch();
    $obj_course = new Course();

    $batch = $obj_batch->oneBatch($row->student_info_batch_fkey);
    $course = $obj_course->oneCourse($row->student_info_course_fkey);

    $student_name = $row->student_info_name;
    $seid = $row->student_info_seid;
    $father_name = $row->student_info_father_name;
    $mother_name = $row->student_info_mother_name;
    $religion = $row->student_info_religion;
    $education = $row->student_info_highest_class_completed;


    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='150'> SEIP ID:</td>";
    $trs .= "<td width='150'> $seid </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Course:</td>";
    $trs .= "<td width='150'> $course->course_name </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'> Batch:</td>";
    $trs .= "<td width='150'> $batch->batch_name </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Name: </td>";
    $trs .= "<td width='150'> $student_name </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Father's Name: </td>";
    $trs .= "<td width='150'> $father_name </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Mother's Name: </td>";
    $trs .= "<td width='150'> $mother_name </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Religion: </td>";
    $trs .= "<td width='150'> $religion </td>";
    $trs .= "</tr>";
    $trs .= "<tr>";
    $trs .= "<td width='150'>Highest Completed Degree: </td>";
    $trs .= "<td width='150'> $education </td>";
    $trs .= "<tr>";


}

$html= <<<BITM
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <titleStudent's Info</title>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="../../../resources/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:700,500" rel="stylesheet" type="text/css">





</head>

<body>

<h1 style="text-align: center;"><b>Student's Details<b/></h1>
<div class="table-responsive">

            <table class="table"  style="width:800px;margin:0 auto; ">

                <tbody>

                  $trs

                </tbody>
            </table>



</body>

</html>
BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output(''.$seid.'.pdf', 'D');