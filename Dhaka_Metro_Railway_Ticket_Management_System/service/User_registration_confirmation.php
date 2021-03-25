<?php
	include_once("db.php");
 
if(isset($_POST['submit'])) { 
    echo "hello";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $mobile= $_POST['mobile'];
    // $cMobile = $_POST['confirm_mobile'];
     $password = $_POST['password'];
   //  $cPassword = $_POST['confirm_password'];
    


}


$query="INSERT INTO Customer_registration(C_name,C_email,C_gender,C_age,C_mobile,C_password)VALUES('$name','$email','$gender','$age','$mobile','$password')";
    $result= executeSQL($query);

header("location:../home.php?registration=success");