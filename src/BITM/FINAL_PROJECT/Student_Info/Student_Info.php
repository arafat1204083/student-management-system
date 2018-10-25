<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 11/29/2016
 * Time: 9:37 AM
 */

namespace App\Student_Info;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Student_Info extends DB
{

    public $student_info_id = "";
    public $student_info_seid = "";
    public $student_info_name = "";
    public $student_info_gender = "";
    public $student_info_national_id_number = "";
    public $student_info_date_of_birth = "";
    public $student_info_present_address = "";
    public $student_info_permanent_address = "";
    public $student_info_home_district = "";
    public $student_info_mobile_number = "";
    public $student_info_email = "";
    public $student_info_religion = "";
    public $student_info_ethnic_group = "";
    public $student_info_education_level = "";
    public $student_info_highest_class_completed = "";
    public $student_info_completed_year = "";
    public $student_info_currently_employed= "";
    public $student_info_family_monthly_income= "";
    public $student_info_physically_challenged= "";
    public $student_info_mother_name= "";
    public $student_info_mother_education_level = "";
    public $student_info_mother_occupation= "";
    public $student_info_father_name= "";
    public $student_info_father_occupation= "";
    public $student_info_father_annual_income= "";
    public $student_info_family_own_home= "";
    public $student_info_family_own_land= "";
    public $student_info_number_of_brother_and_sister = "";
    public $student_info_photo = "";
    public $student_info_batch_fkey = "";
    public $student_info_course_fkey = "";

    public $PicturePath="empty";




    public function __construct()
    {
        parent::__construct();
    }


    public function setData($data=null)
    {
        if(array_key_exists('student_info_id',$data)){
            $this->student_info_id=$data['student_info_id'];
        }
        if(array_key_exists('student_info_seid',$data)){
            $this->student_info_seid=$data['student_info_seid'];

        }

        if(array_key_exists('student_info_name',$data)){
            $this->student_info_name=$data['student_info_name'];

        }

        if(array_key_exists('student_info_gender',$data)){
            $this->student_info_gender=$data['student_info_gender'];
        }
        if(array_key_exists('student_info_national_id_number',$data)){
            $this->student_info_national_id_number=$data['student_info_national_id_number'];

        }
        if(array_key_exists('student_info_course_fkey',$data)){
            $this->student_info_course_fkey=$data['student_info_course_fkey'];

        }

        if(array_key_exists('student_info_date_of_birth',$data)){
            $this->student_info_date_of_birth=$data['student_info_date_of_birth'];
        }
        if(array_key_exists('student_info_present_address',$data)){
            $this->student_info_present_address=$data['student_info_present_address'];

        }

        if(array_key_exists('student_info_permanent_address',$data)){
            $this->student_info_permanent_address=$data['student_info_permanent_address'];
        }
        if(array_key_exists('student_info_home_district',$data)){
            $this->student_info_home_district=$data['student_info_home_district'];

        }

        if(array_key_exists('student_info_mobile_number',$data)){
            $this->student_info_mobile_number=$data['student_info_mobile_number'];
        }
        if(array_key_exists('student_info_email',$data)){
            $this->student_info_email=$data['student_info_email'];

        }

        if(array_key_exists('student_info_religion',$data)){
            $this->student_info_religion=$data['student_info_religion'];
        }
        if(array_key_exists('student_info_ethnic_group',$data)){
            $this->student_info_ethnic_group=$data['student_info_ethnic_group'];

        }

        if(array_key_exists('student_info_education_level',$data)){
            $this->student_info_education_level=$data['student_info_education_level'];
        }
        if(array_key_exists('student_info_highest_class_completed',$data)){
            $this->student_info_highest_class_completed=$data['student_info_highest_class_completed'];

        }

        if(array_key_exists('student_info_completed_year',$data)){
            $this->student_info_completed_year=$data['student_info_completed_year'];
        }
        if(array_key_exists('student_info_currently_employed',$data)){
            $this->student_info_currently_employed=$data['student_info_currently_employed'];

        }

        if(array_key_exists('student_info_family_monthly_income',$data)){
            $this->student_info_family_monthly_income=$data['student_info_family_monthly_income'];
        }
        if(array_key_exists('student_info_physically_challenged',$data)){
            $this->student_info_physically_challenged = implode(',', $_POST['student_info_physically_challenged']);

        }

        if(array_key_exists('student_info_mother_name',$data)){
            $this->student_info_mother_name=$data['student_info_mother_name'];
        }
        if(array_key_exists('student_info_mother_education_level',$data)){
            $this->student_info_mother_education_level=$data['student_info_mother_education_level'];

        }
        if(array_key_exists('student_info_mother_occupation',$data)){
            $this->student_info_mother_occupation=$data['student_info_mother_occupation'];
        }

        if(array_key_exists('student_info_father_name',$data)){
            $this->student_info_father_name=$data['student_info_father_name'];
        }
        if(array_key_exists('student_info_father_occupation',$data)){
            $this->student_info_father_occupation=$data['student_info_father_occupation'];

        }

        if(array_key_exists('student_info_father_annual_income',$data)){
            $this->student_info_father_annual_income=$data['student_info_father_annual_income'];
        }
        if(array_key_exists('student_info_family_own_home',$data)){
            $this->student_info_family_own_home=$data['student_info_family_own_home'];

        }
        if(array_key_exists('student_info_family_own_land',$data)){
            $this->student_info_family_own_land=$data['student_info_family_own_land'];

        }

        if(array_key_exists('student_info_number_of_brother_and_sister',$data)){
            $this->student_info_number_of_brother_and_sister=$data['student_info_number_of_brother_and_sister'];
        }

        if(array_key_exists('student_info_batch_fkey',$data)){
            $this->student_info_batch_fkey=$data['student_info_batch_fkey'];

        }

        if(array_key_exists('student_info_photo',$data)){
            $this->student_info_photo=$data['student_info_photo'];

        }

        if($_FILES["student_info_photo"]["name"])
        {
            $name = $_FILES["student_info_photo"]["name"];
            $microtime = microtime(true);
            $ext = end(explode(".", $_FILES["student_info_photo"]["name"]));
            $date =date("y_m_d_h_m_s");
            $target_name = $date.'_'.$microtime .'.'.$ext;
            $this->target_file = "../../../resources/upload/".$target_name;
            var_dump($_FILES["student_info_photo"]["tmp_name"]);
            if (move_uploaded_file($_FILES["student_info_photo"]["tmp_name"], $this->target_file))
            {
                $move = 1;
                $this->PicturePath= $this->target_file;
            }
            if($move = 0 )
            {
                $msg = "Profile Photo couldnt be uploaded!!";
                $msg_type = "warning";
            }

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
        $sth = $DBH->prepare("select * from student_info WHERE student_info_aproved ='0'");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return $all_data;
    }

    public function stdList($fetchMode = 'ASSOC')
    {
        $fetchMode = strtoupper($fetchMode);
        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from student_info WHERE student_info_aproved ='1'");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return $all_data;
    }
    public function store()



    {
        $dbh=$this->connection;
        $values=array($this->student_info_seid,$this->student_info_name,$this->student_info_course_fkey,
                      $this->student_info_gender,$this->student_info_national_id_number,
                     $this->student_info_date_of_birth,$this->student_info_present_address,$this->student_info_permanent_address,
                    $this->student_info_home_district,$this->student_info_mobile_number,
            $this->student_info_email,$this->student_info_religion,$this->student_info_ethnic_group,
            $this->student_info_education_level,$this->student_info_highest_class_completed,$this->student_info_completed_year,
            $this->student_info_currently_employed,$this->student_info_family_monthly_income,$this->student_info_physically_challenged,
            $this->student_info_mother_name,$this->student_info_mother_education_level,$this->student_info_mother_occupation,
            $this->student_info_father_name,$this->student_info_father_occupation,$this->student_info_father_annual_income,
            $this->student_info_family_own_home,$this->student_info_family_own_land,$this->student_info_number_of_brother_and_sister,
            $this->student_info_batch_fkey, $this->PicturePath
            );

        $query=("INSERT INTO `student_info` ( `student_info_seid`,
 `student_info_name`, `student_info_course_fkey`,`student_info_gender`, `student_info_national_id_number`,
  `student_info_date_of_birth`, `student_info_present_address`, `student_info_permanent_address`,
   `student_info_home_district`, `student_info_mobile_number`, `student_info_email`,
   `student_info_religion`, `student_info_ethnic_group`, `student_info_education_level`, 
   `student_info_highest_class_completed`, `student_info_completed_year`, `student_info_currently_employed`,
    `student_info_family_monthly_income`, `student_info_physically_challenged`, `student_info_mother_name`, 
    `student_info_mother_education_level`, `student_info_mother_occupation`, `student_info_father_name`,
     `student_info_father_occupation`, `student_info_father_annual_income`,
      `student_info_family_own_home`, `student_info_family_own_land`, `student_info_number_of_brother_and_sister`,
       `student_info_batch_fkey`,`student_info_photo`)
        VALUES ( ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
         ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?);");
   


        $sth=$dbh->prepare($query);
        $sth->execute($values);


        if($query)
            Message::message("<div id='msg'></div><h3 align='center'> Thank you for your Registration</h3></div>");
        else
            Message::message("<div id='msg'></div><h3 align='center'> Data Hasn't Been Inserted Successfully!</h3></div>");



        Utility::redirect('index.php');



    }//EOF STORE


    public function approve()
    {
        $dbh=$this->connection;

        $query='UPDATE student_info  SET student_info_aproved  = "1" where student_info_id ='.$this->student_info_id;

        $sth=$dbh->prepare($query);
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Student Has Been approved Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Student has not been approved !</h3></div>");
        Utility::redirect('aplied.php');



    }//EOF TRASH









}



?>


