<?php 
session_start();
require "db.php";
	
	

	// initialize variables
	

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
        $sql="INSERT INTO info (name, address) VALUES ('$name', '$address')";
        executeSQL($sql);
		
		$_SESSION['message'] = "Address saved"; 
        
		header('location: ../customer.php');
	}



    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        
        $sql="UPDATE info SET name='$name', address='$address' WHERE id=$id";
         executeSQL($sql);
       
        $_SESSION['message'] = "Address updated!"; 
        header('location: ../customer.php');
    }



    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql="DELETE FROM info WHERE id=$id";
        executeSQL($sql);
        $_SESSION['message'] = "Address deleted!"; 
        header('location: ../customer.php');
    }