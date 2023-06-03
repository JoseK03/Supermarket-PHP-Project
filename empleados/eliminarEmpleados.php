<?php


require_once("config.php");

$config = new Config();


if(isset($_GET['empleado_id']) && isset($_GET['req'])){
    if($_GET['req']=='delete'){
        $config->SetEmpleadoId($_GET['empleado_id']);
        $config->Delete();

        echo "<script>alert('los datos se borraron exitosamente');document.location='empleados.php'</script>";
    }
}
?>