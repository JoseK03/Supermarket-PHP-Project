<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config/conectar.php");
require_once("../config/db.php");


//primer paso Crear la clase
class Config extends Conectar{

    private $cliente_id;
    private $celular;
    private $compañia;
    
   

    public function __construct($cliente_id = 0, $celular = 0, $compañia = "", $dbCnx = ""){
        $this->cliente_id = $cliente_id;
        $this->celular = $celular;
        $this->compañia = $compañia;

        parent:: __construct($dbCnx);
    }

    public function SetClienteId($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function GetClienteId(){
        return $this->cliente_id;
    }

    public function SetCelular($celular){
        $this->celular = $celular;
    }

    public function GetCelular(){
        return $this->celular;
    }

    public function SetCompañia($compañia){
        $this->compañia = $compañia;
    }

    public function GetCompañia(){
        return $this->compañia;
    }

    
    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO clientes(celular,compañia) values(?,?)");
            $stm->execute([$this->celular, $this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e ->getMessage();
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM clientes WHERE cliente_id = ?");
            $stm->execute([$this->cliente_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM clientes WHERE cliente_id = ? ");
            $stm->execute([$this->cliente_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function UpDate(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE clientes SET celular = ?, compañia = ? WHERE cliente_id = ?");
            $stm->execute([$this->celular, $this->compañia, $this->cliente_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }



    
}




?>