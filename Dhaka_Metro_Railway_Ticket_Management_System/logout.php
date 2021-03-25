<?php
    session_start();

if($_SESSION["login"]=="alogin"){
     unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    header("Location:adminlogin.php");
}
else if($_SESSION["login"]=="clogin"){
     unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    header("Location:customerloginAndregister.php");
    
}
else {
    unset($_SESSION["id"]);
    unset($_SESSION["login"]);
    header("Location:ticketclerklogin.php");
}
   
?>