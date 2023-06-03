<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config/db.php");
require_once("../config/conectar.php");
class LoginUser extends Conectar{

    private $id;
    private $email;
    private $password;

    public function __construct($id = 0,$email="",$password="", $dbCnx=""){
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;

        parent::__construct($dbCnx);
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetId(){
        return $this->id;
    }


    public function SetEmail($email){
        $this->email = $email;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function SetPassword($password){
        $this->password = $password;
    }
    
    public function GetPassword(){
        return $this->password;
    }

   public function fetchAll(){
    try {
        $stm = $this->dbCnx->prepare("SELECT * FROM users");
        $stm->execute();
    } catch (Exception $e) {
        return $e->getMessage();
    }
   }

   public function login(){
    try {
        $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stm->execute([$this->email, md5($this->password)]);
        $user = $stm->fetchAll();
        if(count($user)>0){
            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];
            return true;
        }else{
            false;
        }
    } catch (Exception $e) {
        return $e->getMessage();
    }
   }
 


}



?>