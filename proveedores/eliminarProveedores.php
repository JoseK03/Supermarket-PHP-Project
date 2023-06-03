<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("config.php");
$config = new Config();

if(isset($_GET['proveedor_id'])&& isset($_GET['req']) ){
    if($_GET['req']=='delete'){
        $config->SetProveedorId($_GET['proveedor_id']);
        $config->Delete();
        
        echo "<script>alert('Los datos se han borrado satisfactoriamente');document.location='proveedores.php'</script>";
    }
}

?>