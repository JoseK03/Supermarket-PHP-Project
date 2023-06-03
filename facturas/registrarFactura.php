<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


if(isset($_POST['guardar'])){
    require_once("config.php");

    $config = new ConfigFactura();
    $config->SetEmpleadoId($_POST['empleado_id']);
    $config->SetClienteId($_POST['cliente_id']);
    $config->SetFecha($_POST['fecha']);

    $config->InsertData();
    
    echo "<script>alert('la factura ha sido creada con exito');document.location='factura.php'</script>";
}


?>