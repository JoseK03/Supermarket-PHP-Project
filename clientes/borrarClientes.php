<?php
    
    ini_set("display_errors", 1);

    ini_set("display_startup_errors", 1);
    
    error_reporting(E_ALL);
    
    

    require_once('config.php');
    $record = new Config();

    if(isset($_GET['cliente_id']) && isset($_GET['req'])){
        if($_GET['req']=='delete'){
            $record->SetClienteId($_GET['cliente_id']);
            $record->Delete();

            echo "<script>alert('los datos se borraron exitosamente');document.location='clientes.php'</script>";
        }
    }


?>