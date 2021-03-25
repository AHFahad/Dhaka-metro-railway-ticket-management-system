<?php 
session_start();
require "db.php";
	
	

	// initialize variables
	

	if (isset($_POST['save'])) {
		
        
            $todate = $_POST['todate'];
			$trid = $_POST['trid'];
            $totalbokkedseat=0;
           
        
        
        $sql="INSERT INTO totalBookedSeatByDate (todate,trid,tobookedseat) VALUES ('$todate', '$trid','$tobookedseat')";
        
        

        
        executeSQL($sql);
		
		$_SESSION['message'] = "Info saved!"; 
        
		header('location: ../trainSchedule.php');
	}