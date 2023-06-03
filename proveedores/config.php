<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../config/db.php");
require_once("../config/conectar.php");

class Config extends Conectar{

    private $proveedor_id;
    private $nombre;
    private $telefono;
    private $ciudad;

    public function __construct($proveedor_id = 0, $nombre = "",$telefono = "",$ciudad= "",$dbCnx = ""){
        $this->proveedor_id = $proveedor_id;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        parent:: __construct($dbCnx);
    }




    public function SetProveedorId($proveedor_id){
        $this->proveedor_id = $proveedor_id;
    }

    public function GetProveedorId(){
        return $this->proveedor_id;
    }

    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }

    public function GetNombre(){
        return $this->nombre;
    }

    public function SetTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function GetTelefono(){
        return $this->telefono;
    }

    public function SetCiudad($ciudad){
        $this->ciudad = $ciudad;
    }

    public function GetCiudad(){
        return $this->ciudad;
    }



    public function InsertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO proveedores(nombre,telefono,ciudad) VALUES (?,?,?)");
            $stm->execute([$this->nombre, $this->telefono, $this->ciudad]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function ObtainAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM  proveedores");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Delete(){
        try {
            $stm = $this->dbCnx->prepare("DELETE FROM proveedores WHERE proveedor_id = ?");
            $stm->execute([$this->proveedor_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectOne(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM proveedores WHERE proveedor_id = ?");
            $stm->execute([$this->proveedor_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function Update(){
        try {
            $stm = $this->dbCnx->prepare("UPDATE proveedores SET nombre = ?, telefono = ?, ciudad = ? WHERE proveedor_id = ?");
            $stm->execute([$this->nombre, $this->telefono, $this->ciudad, $this->proveedor_id]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>