<?php
namespace App\User;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;

class Auth extends DB{

    public $admin_username = "";
    public $admin_password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('admin_username', $data)) {
          $this->admin_username = $data['admin_username'];
        }
        if (array_key_exists('admin_password', $data)) {
          $this->admin_password = md5($data['admin_password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `admin` WHERE `admin`.`admin_username` =:admin_username";
        $result=$this->connection->prepare($query);
        $result->execute(array(':admin_username'=>$this->admin_username));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `admin` WHERE `admin_username`=:admin_username AND `admin_password`=:admin_password";
        $result=$this->connection->prepare($query);
        $result->execute(array(':admin_username'=>$this->admin_username, ':admin_password'=>$this->admin_password));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('admin_username', $_SESSION)) && (!empty($_SESSION['admin_username']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['admin_username']="";
        return TRUE;
    }
}

