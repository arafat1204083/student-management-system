<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 12/2/2016
 * Time: 8:13 AM
 */

namespace App\Admin;


use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;



class Admin extends DB
{

    public $admin_id = "";
    public $admin_name = "";
    public $admin_username = "";
    public $admin_password = "";
    public $admin_email = "";
    public $enc_password = "";



    public function __construct()
    {
        parent::__construct();
    }

    public function setData($data = null)
    {
        if (array_key_exists('admin_id', $data)) {
            $this->admin_id = $data['admin_id'];
        }
        if (array_key_exists('admin_name', $data)) {
            $this->admin_name = $data['admin_name'];

        }
        if (array_key_exists('admin_username', $data)) {
            $this->admin_username = $data['admin_username'];

        }

        if (array_key_exists('admin_password', $data)) {
            $this->admin_password = $data['admin_password'];
            $this->enc_password = md5($this->admin_password);

        }
        if (array_key_exists('admin_email', $data)) {
            $this->admin_email = $data['admin_email'];

        }








        if (array_key_exists('checkbox', $data)) {
            $this->checkbox = $data['checkbox'];
        }
    }//EOF set data method


    public function store()
    {
        $query = $this->connection-> prepare("INSERT INTO admin(admin_name,admin_username,admin_password,admin_email)
        VALUES(:admin_name,:admin_username,:admin_password,:admin_email)");
        $query->execute(array(
            "admin_name" => $this->admin_name,
            "admin_username" => $this->admin_username,
            "admin_password" => $this->enc_password,
            "admin_email" => $this->admin_email,

        ));

        if($query)
            Message::message("<div id='msg'></div><h3 align='center'> Data Has Been Inserted Successfully!</h3></div>");
        else
            Message::message("<div id='msg'></div><h3 align='center'> Data Hasn't Been Inserted Successfully!</h3></div>");


        Utility::redirect('addAdmin.php');


    }//EOF STORE

    public function index($fetchMode = 'ASSOC')
    {
        $fetchMode = strtoupper($fetchMode);
        $DBH = $this->connection;
        $sth = $DBH->prepare("select * from admin");
        $sth->execute();
        if (substr_count($fetchMode, 'OBJ') > 0)
            $sth->setFetchMode(PDO::FETCH_OBJ);
        else
            $sth->setFetchMode(PDO::FETCH_ASSOC);

        $all_data = $sth->fetchAll();


        return $all_data;
    }

    public function update()
    {



        $query = $this->connection-> prepare("UPDATE admin SET admin_name='$this->admin_name',admin_username='$this->admin_username',admin_password='$this->admin_password',admin_email='$this->admin_email' WHERE admin_id='$this->admin_id'");

        $STH=$query->execute();
        if($STH) {
            Message::message("<div class='alert alert-success' id='msg'><h3 align='center'>  Data Has Been Updated Successfully!</h3></div>");

        }
        else{
            Message::message("<div class='alert alert-danger' id='msg'><h3 align='center'> Data Has Not Been Updated Successfully!</h3></div>");

        }
        Utility::redirect("addAdmin.php");

    }
    public function delete($id){
        $DBH=$this->connection;
        $sth=$DBH->prepare("delete  from admin Where admin_id=$id");
        $sth->execute();
        if($sth)
        { Message::message("<div id='msg'><h3 align='center'>
               <br> Data Has deleted Successfully!</h3></div>");
        }

        else
            Message::message("<div id='msg'></div><h3 align='center'> <br> Data Hasn't Been Inserted !</h3></div>");
        Utility::redirect('addAdmin.php');


    }




}