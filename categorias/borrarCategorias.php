<?php

//ubicar error en el codigo, principalmente la zona

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once('config.php');

$record = new Config();

if(isset($_GET['categoria_id']) && isset($_GET['req'])){
    if($_GET['req']=='delete'){
        $record->SetCategoriaId($_GET['categoria_id']);
        $record->Delete();

        echo "<script>alert('Los datos se han borrado satisfactoriamente');document.location='categorias.php'</script>";
    }
}

?>