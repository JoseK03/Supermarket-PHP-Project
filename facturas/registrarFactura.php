<?php

if(isset($_POST['guardar'])){
    require_once("config.php");

    $config = new Config();
    $config->SetEmpleadoId($_POST['empleado_id']);
    $config->SetClienteId($_POST['cliente_id']);
    $config->SetFecha($_POST['fecha']);

    $config->InsertData();
    echo "<script>alert('la factura ha sido creada con exito');document.location='facturas.php'</script>";
}


?>