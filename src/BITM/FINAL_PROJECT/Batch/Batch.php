<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 11/28/2016
 * Time: 11:46 AM
 */

namespace App\Batch;

use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;



class Batch extends DB
{
    public $batch_id = "";
    public $batch_name = "";
    public $batch_course_fkey = "";
    public $batch_day = "";
    public $batch_time = "";



    public function __construct()
    {
        parent::__construct();
    }


    public function setData($data=null)
    {
        if(array_key_exists('batch_id',$data)){
            $this->batch_id=$data['batch_id'];
        }
        if(array_key_exists('batch_name',$data)){
            $this->batch_name=$data['batch_name'];

        }

        if(array_key_exists('batch_course_fkey',$data)){
            $this->batch_course_fkey=$data['batch_course_fkey'];

        }
        if(array_key_exists('batch_day',$data)){
            $this->batch_day=$data['batch_day'];

        }
        if(array_key_exists('batch_time',$data)){
            $this->batch_time=$data['batch_time'];

        }

        if(array_key_exists('checkbox',$data))
        {
            $this->checkbox = $data['checkbox'];
        }
    }//EOF set data method


    public function index($fetchMode = 'ASSOC')
    {
        $fetchMode = strtoupper($fetchMode);
        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from batch where is_deleted='0'");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return $all_data;
    }
    public function complete($fetchMode = 'ASSOC')
    {
        $fetchMode = strtoupper($fetchMode);
        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from batch where is_deleted='1'");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return count($all_data);
    }
    public function oneBatch($id)
    {

        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from batch WHERE batch_id=$id");
        $sth->execute();

        $sth->setFetchMode(PDO::FETCH_OBJ);


        $all_data = $sth->fetch();


        return $all_data;
    }

    public function get_time($id)
    {

        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from batch WHERE batch_course_fkey ='$id'");
        $sth->execute();

            $sth->setFetchMode(PDO::FETCH_OBJ);


        $all_data = $sth->fetchAll();
        foreach($all_data as $batch){
        echo' <div class="col-sm-4"><input type="radio" name="student_info_batch_fkey" value="'.$batch->batch_id.'">'.$batch->batch_name.'<br>'.$batch->batch_time.' </br>('.$batch->batch_day.')</div> ';
    }


    }


    public function store()
    {

        $query = $this->connection-> prepare("INSERT INTO batch(batch_name, batch_course_fkey,batch_day,batch_time)
        VALUES(:batch_name,:batch_course_fkey,:batch_day,:batch_time)");
        $query->execute(array(
            "batch_name" => $this->batch_name,
            "batch_course_fkey" => $this->batch_course_fkey,
            "batch_time" => $this->batch_time,
            "batch_day" => $this->batch_day,

        ));

        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>Data Has Been Inserted Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>Data Has Not Been Inserted Successfully!</h3></div>");

        }
        Utility::redirect("index.php");


    }

    public function update()
    {



        $query = $this->connection-> prepare("UPDATE batch SET batch_name='$this->batch_name',batch_course_fkey='$this->batch_course_fkey',batch_day='$this->batch_day',batch_time='$this->batch_time' WHERE batch_id='$this->batch_id'");

        $STH=$query->execute();
        if($STH) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>  Data Has Been Updated Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'> Data Has Not Been Updated Successfully!</h3></div>");

        }
        Utility::redirect("index.php");

    }
    public function delete($id){
        $DBH=$this->connection;
        $sth=$DBH->prepare("delete  from batch Where batch_id=$id");
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Data Has deleted Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Hasn't Been Inserted !</h3></div>");
        Utility::redirect('index.php');


    }


    public function trash($id)
    {
        $dbh=$this->connection;


        //var_dump($values);


        $query='UPDATE batch  SET is_deleted  = "1" where batch_id ='.$id;

        $sth=$dbh->prepare($query);
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Batch Has Been closed Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Batch Hasn't Been closed !</h3></div>");
        Utility::redirect('index.php');



    }//EOF TRASH

    public function trashed($fetchMode='ASSOC'){
        $fetchMode = strtoupper($fetchMode);
        $DBH=$this->connection;
        $sth=$DBH->prepare("select * from batch WHERE is_deleted='1'");
        $sth->execute();
        if(substr_count($fetchMode,'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);


        $allData=$sth->fetchAll();

        return  $allData;
    }//end of trashed method which show the trashed list


    public function recover($id){
        $dbh=$this->connection;


        //var_dump($values);


        $query='UPDATE batch SET is_deleted  = "0" where batch_id ='.$id;

        $sth=$dbh->prepare($query);
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Data Has Been recovered Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Hasn't Been recovered !</h3></div>");
        Utility::redirect('recovery.php');



    }///EOF recover

    public function mulRecover()

    {
        $checkbox = $_POST['checkbox'];
        /* var_dump($checkbox);die();*/
        for ($i = 0; $i < count($checkbox);$i++) {
            $query = $this->connection->prepare("UPDATE batch SET is_deleted='0' WHERE batch_id='$checkbox[$i]'");
            var_dump($query);
            $query->execute();
            if ($query) {
                Message::message("<div class='alert alert-success' id='msg'><h3 align='center'> Data Has Been Recoverd Successfully!</h3></div>");

            } else {
                Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ BookTitle: $this->book_title ] , [ AuthorName: $this->author_name ] <br> Data Has Not Been Deleted Successfully!</h3></div>");

            }
            Utility::redirect("recovery.php");
        }
    }//EOF mulRecover

    public function count($fetchMode='ASSOC'){
        $DBH=$this->connection;
        $query="SELECT COUNT(*) AS totalItem FROM `admission_management_system`.`batch` WHERE `is_deleted`=0 ";
        $sth=$DBH->prepare($query);
        $sth->execute();
        if(substr_count($fetchMode,'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);


        $row=$sth->fetchAll();


        /* $result=mysqli_query($this->conn,$query);*/
        /* $row= mysqli_fetch_assoc($sth);*/
        return $row['totalItem'];
    }//end of count

    public function deleteMultiple($id)
    {
        $checkbox = $_POST['checkbox'];
        for ($i = 0; $i < count($checkbox);$i++)
        {

            $query =$this->connection->prepare("delete  from batch WHERE batch_id='$checkbox[$i]'");
            var_dump($query);
            $query->execute();

            if ($query)
            {
                Message::message("<div class=\"alert alert-info\"><strong>Deleted!</strong> Selected Data has been deleted successfully.</div>");
                Utility::redirect("index.php");
            }
            else
            {
                Message::message("<div class=\"alert alert-info\"> <strong>Deleted!</strong> Selected Data has not been deleted successfully.</div>");
                Utility::redirect("index.php");
            }

        }
    }


    public function mulSoftDelete()

    {
        $checkbox = $_POST['checkbox'];
        for ($i = 0; $i < count($checkbox);$i++) {
            $query = $this->connection->prepare("UPDATE batch SET is_deleted='1' WHERE batch_id='$checkbox[$i]'");
            var_dump($query);
            $query->execute();
            if ($query) {
                Message::message("<div class='alert alert-success' id='msg'><h3 align='center'> Data Has Been Deleted Successfully!</h3></div>");

            } else {
                Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'> Data Has Not Been Deleted Successfully!</h3></div>");

            }
            Utility::redirect("multipleDelete.php");
        }
    }//end of multiple trash delete

}
