<?php
namespace App\Model;
use PDO;
class Database{

    public $connection;
    public  $host="localhost";
    public  $dbname="admission_management_system";
    public  $user="root";
    public  $pass="";

    public  function __construct(){
        try  {

            $host=$this->host;
            $dbname=$this->dbname;
            $user=$this->user;
            $pass=$this->pass;


            $this->connection = new PDO("mysql:host=$host;dbname=$dbname",$user, $pass);



            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        }
        catch(PDOException $e){

            echo "could not connect";
            file_put_contents("pdoerrors.txt", $e->getMessage(),FILE_APPEND);
        }
    }
}
/*$obj=new Database();*/












