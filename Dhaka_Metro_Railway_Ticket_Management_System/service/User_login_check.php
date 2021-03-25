<?php
	include "db_access.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST")
     {
     	$result=User_login_check($_POST["phonenumberoremail"],$_POST["password"]);
     } 