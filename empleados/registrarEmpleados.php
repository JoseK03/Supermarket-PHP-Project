<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){

    require_once("config.php");

    $config = new Config();

    $config->SetNombre($_POST['nombre']);
    $config->SetCelular($_POST['celular']);
    $config->SetDireccion($_POST['direccion']);

    $config->InsertData();

    echo "<script>alert('los datos fueron agregados exitosamente');document.location='empleados.php'</script>";

}


?>