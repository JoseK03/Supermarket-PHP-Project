<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


if(isset($_POST['guardar'])){

    require_once("config.php");

    $config= new Config();

    $config->SetNombre($_POST['nombre']);
    $config->SetDescripcion($_POST['descripcion']);

    $config-> InsertData();

    echo "<script>alert('Todos los datos fueron registrados exitoriamente'); document.location ='categorias.php'</script>";
}


?>