<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

if(isset($_POST['registrarse'])){
    require_once("registroUser.php");

    $registrar = new RegistroUser();

    $registrar->SetEmpleadoId(2);
    $registrar->SetEmail($_POST['email']);
    $registrar->SetUserName($_POST['username']);
    $registrar->SetPassword($_POST['password']);

    $registrar->InsertData();

    echo "<script>alert('Usuario registrado satisfactoriamente');document.location='loginRegister.php'</script>";
}


?>