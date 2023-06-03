<?php

require_once("../config/conectar.php");
require_once("../config/db.php");

class Confing extends Conectar{
    private $factura_id;
    private $empleado_id;
    private $cliente_id;
    private $fecha;

    public function __construct($factura_id = 0, $empleado_id = 0, $cliente_id = 0, $fecha = "", $dbCnx=""){
        $this->factura_id = $factura_id;
        $this->empleado_id = $empleado_id;
        $this->cliente_id = $cliente_id;
        $this->fecha = $fecha;

        parent:: __construct($dbCnx);
    }

    public function SetFacturaId($factura_id){
        $this->factura_id = $factura_id;
    }

    public function GetFacturaId(){
        return $this->factura_id;
    }

    public function SetEmpleadoId($empleado_id){
        $this->empleado_id = $empleado_id;
    }

    public function GetEmpleadoId(){
        return $this->empleado_id;
    }

    public function SetCliente_id($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function GetClienteId(){
        return $this->cliente_id;
    }

    public function SetFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function GetFecha(){
        return $this->fecha;
    }

    public function InsertData(){
        try {
            $stm= $this->dbCnx->prepare("INSERT INTO factura(empleado_id,cliente_id,fecha) values(?,?,?)");
            $stm->execute([$this->empleado_id,$this->cliente_id,$this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM facturas");
            $stm->execute();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}




?>