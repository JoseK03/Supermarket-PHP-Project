<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['guardar'])){
    require_once("config.php");
    $record= new Config();


    $record->SetNombre($_POST['nombre']);
    $record->SetTelefono($_POST['telefono']);
    $record->SetCiudad($_POST['ciudad']);


    $record->InsertData();

    echo "<script>alert('los datos han sido agregados exitosamente');document.location='proveedores.php'</script>";
 }


?>