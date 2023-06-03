<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if(isset($_POST['loguearse'])){

    require_once("loginUser.php");
    $credenciales = new LoginUser();

    $credenciales->SetEmail($_POST['email']);
    $credenciales->SetPassword($_POST['password']);

    $login = $credenciales->login();

    if($login){
        header('Location:../Home/home.php');
    }else{
        echo "<script>alert('password/email invalidos');document.location='loginRegister.php'</script>";
    }
    
}

?>