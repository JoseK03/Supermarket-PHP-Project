<?php

//ubicar error en el codigo, principalmente la zona

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config/db.php");
require_once("../config/conectar.php");


class Config extends Conectar{

    private $categoria_id;
    private $nombre;
    private $descripcion;
    
    public function __construct($categoria_id = 0,$nombre= "",$descripcion="", $dbCnx=""){
        $this->categoria_id = $categoria_id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        parent:: __construct($dbCnx);
    }

    public function SetCategoriaId($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    public function GetCategoriaId(){
        return $this->categoria_id;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function GetDescripcion(){
        return $this->descripcion;
    }

    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO categorias(nombre,descripcion) values(?,?)");
            $stm->execute([$this->nombre, $this->descripcion]);
        } catch (Exception $e) {
            return $e->getMessage();            
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();            
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM categorias WHERE categoria_id = ?");
            $stm->execute([$this->categoria_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM categorias WHERE categoria_id = ?");
            $stm->execute([$this->categoria_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function UpDate(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE categorias SET nombre = ?, descripcion = ? WHERE categoria_id = ?");
            $stm->execute([$this->nombre ,$this->descripcion, $this->categoria_id]);
            return $stm->fetchAll();    
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
    

}

?>