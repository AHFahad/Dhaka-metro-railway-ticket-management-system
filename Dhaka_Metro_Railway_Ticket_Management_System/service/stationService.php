<?php 
session_start();
require "db.php";
	
	

	// initialize variables
	

	if (isset($_POST['save'])) {
		
        
            $sname = $_POST['sname'];
			$slocation = $_POST['slocation'];
            $sstatus=$_POST['sstatus'];
//            $cemail=$_POST['cemail'];
//            $cpassword=$_POST['cpassword'];
//            $cdob=$_POST['cdob'];
        
        
        $sql="INSERT INTO station (sname, slocation,sstatus) VALUES ('$sname', '$slocation','$sstatus')";
        executeSQL($sql);
		
		$_SESSION['message'] = "station Info saved!"; 
        
		header('location: ../station.php');
	}



    if (isset($_POST['update'])) {
            $sid = $_POST['sid'];
            $sname = $_POST['sname'];
			$slocation = $_POST['slocation'];
            $sstatus=$_POST['sstatus'];
//            $cemail=$_POST['cemail'];
//            $cpassword=$n['cpassword'];
//            $cdob=$_POST['cdob'];
        
     $sql="UPDATE station SET sname='$sname', slocation='$slocation',sstatus='$sstatus' WHERE sid=$sid";
         executeSQL($sql);
       
       $_SESSION['message'] = "station Info updated!"; 
        header('location: ../station.php');
    }



    if (isset($_GET['del'])) {
        $sid = $_GET['del'];
        $sql="DELETE FROM station WHERE sid=$sid";
        executeSQL($sql);
        $_SESSION['message'] = "station deleted!"; 
        header('location: ../station.php');
    }