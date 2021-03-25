<?php 
session_start();
require "db.php";
	
	

	// initialize variables
	

	if (isset($_POST['save'])) {
		
        
            $tname = $_POST['tname'];
			$taddress = $_POST['taddress'];
            $tmobile=$_POST['tmobile'];
            $temail=$_POST['temail'];
            $tpassword=$_POST['tpassword'];
            $tdob=$_POST['tdob'];
            
        
        
        $sql="INSERT INTO ticketClerk (tname, taddress,tmobile,temail,tpassword,tdob) VALUES ('$tname', '$taddress','$tmobile','$temail','$tpassword','$tdob')";
        executeSQL($sql);
		
		$_SESSION['message'] = "Tciket Clerk Info saved!".$tname.$temail; 
        
		header('location: ../ticketClerk.php');
	}



    if (isset($_POST['update'])) {
            $tid = $_POST['tid'];
            $tname = $_POST['tname'];
			$taddress = $_POST['taddress'];
            $tmobile=$_POST['tmobile'];
            $temail=$_POST['temail'];
            //$tpassword=$n['tpassword'];
            $tdob=$_POST['tdob'];
        
     $sql="UPDATE ticketclerk SET tname='$tname', taddress='$taddress',tmobile='$tmobile',temail='$temail',tdob='$tdob' WHERE tid=$tid";
         executeSQL($sql);
       
       $_SESSION['message'] = "TicketClerk Info updated!"; 
        header('location: ../ticketClerk.php');
    }



    if (isset($_GET['del'])) {
        $tid = $_GET['del'];
        $sql="DELETE FROM ticketclerk WHERE tid=$tid";
        executeSQL($sql);
        $_SESSION['message'] = "Ticket Clerk deleted!"; 
        header('location: ../ticketClerk.php');
    }



if (isset($_POST['Login'])) {

                $tid = $_POST['tid'];
                $tpassword=$_POST['tpassword'];
                
            $sql = "SELECT * FROM ticketclerk WHERE tid = '$tid' and tpassword = '$tpassword'";
            $result=executeSQL($sql);
            $count = mysqli_num_rows($result);
        
            if($count >= 1) {
         
//                $_SESSION['message']="login succesfull!";
                $_SESSION['login']="tlogin";
                $_SESSION['id']=$tid;
                header("location: ../ticketClerkhome.php");
               
            }
            else { 
                
             $error = "Your Login ID or Password is invalid".$tid.$tpassword.$count;
             $_SESSION['message']=$error;
             header('location: ../ticketClerkLogin.php');

              
            }
           
        }
