<?php 
session_start();
require "db.php";
	
	

	// initialize variables
	

	if (isset($_POST['save'])) {
		
        
            $trname = $_POST['trname'];
			$trprice = $_POST['trprice'];
            $trseatcapacity=$_POST['trseatcapacity'];
            $trstarttime=$_POST['trstarttime'];
            $trendtime=$_POST['trendtime'];
            $trstartstation=$_POST['trstartstation'];
        
            $trendstation=$_POST['trendstation'];
            $trstatus=$_POST['trstatus'];
        
        
        $sql="INSERT INTO train (trname, trprice,trseatcapacity,trstarttime,trendtime,trstartstation,trendstation,trstatus) VALUES ('$trname', '$trprice','$trseatcapacity','$trstarttime','$trendtime','$trstartstation','$trendstation','$trstatus')";
        
        

        
        executeSQL($sql);
		
		$_SESSION['message'] = "train Info saved!".$trstartstation; 
        
		header('location: ../train.php');
	}



    if (isset($_POST['update'])) {
            $trid = $_POST['trid'];
            $trname = $_POST['trname'];
			$trprice = $_POST['trprice'];
            $trseatcapacity=$_POST['trseatcapacity'];
            $trstarttime=$_POST['trstarttime'];
            $trendtime=$_POST['trendtime'];
            $trstartstation=$_POST['trstartstation'];
            $trendstation=$_POST['trendstation'];
            $trstatus=$_POST['trstatus'];
        
     $sql="UPDATE train SET trname='$trname', trprice='$trprice',trseatcapacity='$trseatcapacity',trstarttime='$trstarttime', trendtime='$trendtime',trstartstation='$trstartstation',trendstation='$trendstation',trstatus='$trstatus' WHERE trid=$trid";
        
//        $sql="UPDATE train SET trname='$trname', trprice='$trprice',trseatcapacity='$trseatcapacity',trstarttime='$trstarttime', trendtime='$trendtime',trstartstation='$trstartstation' WHERE trid=$trid";
        
         executeSQL($sql);
       
       $_SESSION['message'] = "train Info updated!".$trendtime; 
        header('location: ../train.php');
    }



    if (isset($_GET['del'])) {
        $trid = $_GET['del'];
        $sql="DELETE FROM train WHERE trid=$trid";
        executeSQL($sql);
        $_SESSION['message'] = "train deleted!"; 
        header('location: ../train.php');
    }