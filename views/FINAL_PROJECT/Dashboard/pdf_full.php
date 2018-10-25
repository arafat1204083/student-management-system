<?php
include_once ('../../../vendor/autoload.php');
use App\Dashboard\Dashboad;
use App\Course\Course;
use App\Batch\Batch;

$obj= new Dashboad();
$batchName =$_REQUEST['batch'];
if($batchName==0)
$recordSet=$obj->index("obj");
else
    $recordSet=$obj->index_batch($batchName);

//var_dump($allData);
$trs="";
$sl=0;




foreach($recordSet as $row) {
    $obj_batch = new Batch();
    $batch = $obj_batch->oneBatch($row->student_info_batch_fkey);


    $id =  $row->student_info_id;
    $student_info_name = $row->student_info_name;
    $student_info_mobile_number = $row->student_info_mobile_number;
    $student_info_email = $row->student_info_email;


    /*$batch_name = $row['batch_name'];*/


    $sl++;
    $trs .= "<tr>";
    $trs .= "<td width='150'> $sl</td>";
    $trs .= "<td width='150'> $id </td>";
    $trs .= "<td width='300'> $student_info_name </td>";
    $trs .= "<td width='300'> $student_info_mobile_number </td>";
    $trs .= "<td width='300'> $student_info_email </td>";
    $trs .= "<td width='300'> $batch->batch_name </td>";




    $trs .= "</tr>";
}

$html= <<<BITM
<div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th align='left'>Serial</th>
                    <th align='left' >ID</th>
                    <th align='left' >Student Name</th>
                    <th align='left' >Student Mobile No</th>
                    <th align='left' >Student Email </th>
                    <th align='left' >Batch</th>

              </tr>
                </thead>
                <tbody>

                  $trs

                </tbody>
            </table>




BITM;


// Require composer autoload
require_once ('../../../vendor/mpdf/mpdf/mpdf.php');
//Create an instance of the class:

$mpdf = new mPDF();

// Write some HTML code:

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
if($batchName==0)
$mpdf->Output('list.pdf', 'D');
else
    $mpdf->Output(''. $batch->batch_name.'.pdf', 'D');
