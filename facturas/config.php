<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


require_once("../config/conectar.php");
require_once("../config/db.php");

class ConfigFactura extends Conectar{
    private $factura_id;
    private $empleado_id;
    private $cliente_id;
    private $fecha;

    public function __construct($factura_id = 0, $empleado_id = "", $cliente_id = "", $fecha = "", $dbCnx=""){
        $this->factura_id = $factura_id;
        $this->empleado_id = $empleado_id;
        $this->cliente_id = $cliente_id;
        $this->fecha = $fecha;

        parent:: __construct($dbCnx);
    }


    //-------------------------FACTURA ID-------------------------
    public function SetFacturaId($factura_id){
        $this->factura_id = $factura_id;
    }

    public function GetFacturaId(){
        return $this->factura_id;
    }

    //-------------------------EMPLEADO-------------------------

    public function SetEmpleadoId($empleado_id){
        $this->empleado_id = $empleado_id;
    }

    public function GetEmpleadoId(){
        return $this->empleado_id;
    }

    //-------------------------CLIENTE ID-------------------------

    public function SetClienteId($cliente_id){
        $this->cliente_id = $cliente_id;
    }

    public function GetClienteId(){
        return $this->cliente_id;
    }

    //-------------------------FECHA-------------------------

    public function SetFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function GetFecha(){
        return $this->fecha;
    }

    public function InsertData(){
        try {
            $stm= $this->dbCnx->prepare("INSERT INTO facturas(factura_id , empleado_id,cliente_id,fecha) VALUE (NULL,?,?,?)");
            $stm->execute([$this->empleado_id,$this->cliente_id,$this->fecha]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectAlls(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM facturas");
            $stm->execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function SelectEmpleado(){
        try {
            $stm = $this->dbCnx->prepare("SELECT empleado_id, nombre  FROM empleados");
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function SelectCliente(){
        try {
            $stm = $this->dbCnx->prepare("SELECT cliente_id, nombre FROM clientes");
            $stm->execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}




?>