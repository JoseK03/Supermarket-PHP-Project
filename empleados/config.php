<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config/db.php");
require_once("../config/conectar.php");

class Config extends Conectar{

    private $empleado_id;
    private $nombre;
    private $celular;
    private $direccion;

    public function __construct($empleado_id = 0, $nombre = "", $celular = 0, $direccion = "", $dbCnx=""){
        $this->empleado_id = $empleado_id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->direccion = $direccion;

        parent:: __construct($dbCnx);
    }

    public function SetEmpleadoId($empleado_id){
        $this->empleado_id = $empleado_id;
    }

    public function GetEmpleadoId(){
        return $this->empleado_id;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetCelular($celular){
        $this->celular = $celular;
    }

    public function GetCelular(){
        return $this->celular;
    }

    public function SetDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function GetDireccion(){
        return $this->direccion;
    }

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO empleados(nombre,celular,direccion) values(?,?,?)");
            $stm->execute([$this->nombre, $this->celular, $this->direccion]);

        } 
        catch (Exception $e) {
            return $e->getMessage();            
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();            
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM empleados WHERE empleado_id = ?");
            $stm->execute([$this->empleado_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM empleados WHERE empleado_id = ?");
            $stm->execute([$this->empleado_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE empleados SET nombre = ?, celular = ?, direccion = ? WHERE empleado_id = ?");
            $stm->execute([$this->nombre, $this->celular, $this->direccion, $this->empleado_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    



}



?>
