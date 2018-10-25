<?php

namespace App\Dashboard;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;

class Dashboad extends DB
{
    public $exel_course_fkey="";


    public function setData($data = null)
    {
        if (array_key_exists('exel_course_fkey', $data)) {
          echo  $this->exel_course_fkey = $data['exel_course_fkey'];
        }




        if (array_key_exists('checkbox', $data)) {
            $this->checkbox = $data['checkbox'];
        }
    }
   /* public function store()
    {

        echo $file = $_FILES["file"]["tmp_name"];
       // $file ="C:\\xampp\\htdocs\\DEADCODE_B37\\r\\Id_Number.xlsx";
        echo "<br>";
        echo $this->exel_course_fkey;
        $handle = fopen($file, "r");

        $count = 0;                                         // add this line
        while (($emapData = fgetcsv($handle, 10000, ",")) !== FALSE) {
            $emapData[0];
            print_r($emapData);
            //exit();

            $count++;                                      // add this line

            if ($count > 1) {
                $query = $this->connection->prepare("INSERT INTO exel(exel_seip, exel_course_fkey)
          VALUES('$emapData[0]','$this->exel_course_fkey')");
                var_dump($query);
                $query->execute();

            }


            if ($query) {
                Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>You database has imported successfully . You have inserted “. $c .” recoreds</h3></div>");

            } else {
                Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>Sorry!There is some problem !</h3></div>");

            }
            //Utility::redirect("index.php");
            fclose($file);
        }
    }
*/


    public function index($fetchMode='ASSOC'){
        $fetchMode = strtoupper($fetchMode);
        $DBH=$this->connection;
        $sth=$DBH->prepare("select * from student_info WHERE student_info_aproved='1'");
        $sth->execute();
        if(substr_count($fetchMode,'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);


        $all_books=$sth->fetchAll();

        return  $all_books;
    }//end of index method
    public function single_pdf($id)
    {

        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from student_info WHERE student_info_id=$id");
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_OBJ);


        $all_books = $sth->fetchAll();

        return $all_books;
    }

        public function indexStudent($fetchMode='ASSOC',$id){
        $fetchMode = strtoupper($fetchMode);
        $DBH=$this->connection;
        $sth=$DBH->prepare("select * from student_info WHERE student_info_aproved='1' AND student_info_batch_fkey = $id");
        $sth->execute();
        if(substr_count($fetchMode,'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);


        $all_books=$sth->fetchAll();

        return  $all_books;
    }

    public function index_batch($id){

        $DBH=$this->connection;
        $sth=$DBH->prepare("select * from student_info WHERE student_info_aproved='1' AND student_info_batch_fkey =$id");
        $sth->execute();

            $sth->setFetchMode(PDO::FETCH_OBJ);

        $all_books=$sth->fetchAll();

        return  $all_books;
    }//end of index method
    public function indexPaginator($page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from student_info  WHERE student_info_aproved = '1' LIMIT $start,$itemsPerPage";

        $STH = $this->connection->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator();
    public function studentPaginator($id=1,$page=0,$itemsPerPage=3){

        $start = (($page-1) * $itemsPerPage);

        $sql = "SELECT * from student_info  WHERE student_info_aproved = '1' AND student_info_batch_fkey = $id LIMIT $start,$itemsPerPage";

        $STH = $this->connection->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData  = $STH->fetchAll();
        return $arrSomeData;

    }




}