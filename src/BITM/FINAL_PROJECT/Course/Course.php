<?php
namespace App\Course;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Course extends DB
{
    public $course_id = "";
    public $course_name = "";


    public function __construct()
    {
        parent::__construct();
    }


    public function setData($data = null)
    {
        if (array_key_exists('course_id', $data)) {
            $this->course_id = $data['course_id'];
        }
        if (array_key_exists('course_name', $data)) {
            $this->course_name = $data['course_name'];

        }


        if (array_key_exists('checkbox', $data)) {
            $this->checkbox = $data['checkbox'];
        }
    }//EOF set data method


    public function store()
    {
        $query = $this->connection-> prepare("INSERT INTO course(course_name)
        VALUES(:course_name)");
        $query->execute(array(
            "course_name" => $this->course_name,

        ));

        if($query)
            Message::message("<div id='msg'></div><h3 align='center'>[ course name: $this->course_name ] <br> Data Has Been Inserted Successfully!</h3></div>");
        else
            Message::message("<div id='msg'></div><h3 align='center'> Data Hasn't Been Inserted Successfully!</h3></div>");


        Utility::redirect('index.php');


    }//EOF STORE


    public function index($fetchMode = 'ASSOC')
    {
        $fetchMode = strtoupper($fetchMode);
        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from course");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return $all_data;
    }

    public function oneCourse($id)
    {

        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from course WHERE course_id=$id");
        $sth->execute();

            $sth->setFetchMode(PDO::FETCH_OBJ);


        $all_data = $sth->fetch();


        return $all_data;
    }

    public function update()
    {


        $query = $this->connection-> prepare("UPDATE course SET course_name='$this->course_name' WHERE course_id='$this->course_id'");

        $query->execute();
        if($query) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>[ BookTitle: $this->BookTitle ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Been Updated Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'>[ BookTitle: $this->BookTitle ] , [ AuthorName: $this->BookAuthor ] <br> Data Has Not Been Updated Successfully!</h3></div>");

        }
        Utility::redirect("index.php");

    }//EOF update


    public function delete($id){
        $DBH=$this->connection;
        $sth=$DBH->prepare("delete  from course Where course_id=$id");
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Data Has deleted Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Hasn't Been Inserted !</h3></div>");
        Utility::redirect('index.php');


    }//EOF delete


}



?>


