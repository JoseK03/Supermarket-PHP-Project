<?php

require_once("../config/db.php");
require_once("../config/conectar.php");
class RegistroUser extends Conectar{

    private $id;
    private $empleado_id;
    private $email;
    private $username;
    private $password;

    public function __construct($id = 0, $empleado_id=0,$email="",$username="",$password="", $dbCnx=""){
        $this->id = $id;
        $this->empleado_id = $empleado_id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;

        parent::__construct($dbCnx);
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function GetId(){
        return $this->id;
    }

    public function SetEmpleadoId($empleado_id){
        $this->empleado_id = $empleado_id;
    }

    public function GetEmpleadoId(){
        return $this->empleado_id;
    }

    public function SetEmail($email){
        $this->email = $email;
    }

    public function GetEmail(){
        return $this->email;
    }

    public function SetUserName($username){
        $this->username = $username;
    }

    public function GetUserName(){
        return $this->username;
    }

    public function SetPassword($password){
        $this->password = $password;
    }
    
    public function GetPassword(){
        return $this->password;
    }

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users(empleado_id, email, username, password) values (?,?,?,?)");
            $stm->execute([$this->empleado_id, $this->email, $this->username, md5($this->password)]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}



?>