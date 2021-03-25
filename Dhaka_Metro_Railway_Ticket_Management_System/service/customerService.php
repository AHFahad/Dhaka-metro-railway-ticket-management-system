<?php 
session_start();
require "db.php";
	



	

	// initialize variables
	

	if (isset($_POST['save'])) {
		
            $cid=0;
            $cname = $_POST['cname'];
			$caddress = $_POST['caddress'];
            $cmobile=$_POST['cmobile'];
            $cemail=$_POST['cemail'];
            $cpassword=$_POST['cpassword'];
            $cdob=$_POST['cdob'];
            $cstatus=$_POST['cstatus'];
        
        
        $sql="INSERT INTO customer (cname, caddress,cmobile,cemail,cpassword,cdob,cstatus) VALUES ('$cname', '$caddress','$cmobile','$cemail','$cpassword','$cdob','$cstatus')";
        executeSQL($sql);
		
        
        $record =executeSQL( "SELECT * FROM customer ORDER BY cid DESC LIMIT 1");

		{
			$n = mysqli_fetch_array($record);
			$cid = $n['cid'];
		
             
            
		}
        
        
		$_SESSION['message'] = "custmer account hasbeen created! ID is :".$cid; 
        
		header('location: ../customer.php');
	}



    if (isset($_POST['signup'])) {
		
        $cid=0;
        $cname = $_POST['cname'];
        $caddress = $_POST['caddress'];
        $cmobile=$_POST['cmobile'];
        $cemail=$_POST['cemail'];
        $cpassword=$_POST['cpassword'];
        $cdob=$_POST['cdob'];
        $cstatus=$_POST['cstatus'];
    
    
    $sql="INSERT INTO customer (cname, caddress,cmobile,cemail,cpassword,cdob,cstatus) VALUES ('$cname', '$caddress','$cmobile','$cemail','$cpassword','$cdob','$cstatus')";
    executeSQL($sql);
    
    
    $record =executeSQL( "SELECT * FROM customer ORDER BY cid DESC LIMIT 1");

    {
        $n = mysqli_fetch_array($record);
        $cid = $n['cid'];
    
         
        
    }
    
    
    $_SESSION['message'] = "custmer account hasbeen created! ID is ".$cid." wait for account to aproved"; 
    
    header('location: ../customerloginAndRegister.php');
    }
    



    if (isset($_POST['update'])) {
            $cid = $_POST['cid'];
            $cname = $_POST['cname'];
			$caddress = $_POST['caddress'];
            $cmobile=$_POST['cmobile'];
            $cemail=$_POST['cemail'];
            //$cpassword=$n['cpassword'];
            $cdob=$_POST['cdob'];
             $cstatus=$_POST['cstatus'];
        
     $sql="UPDATE customer SET cname='$cname', caddress='$caddress',cmobile='$cmobile',cemail='$cemail',cdob='$cdob',cstatus='$cstatus' WHERE cid=$cid";
         executeSQL($sql);
       
       $_SESSION['message'] = "customer Info updated!"; 
        header('location: ../customer.php');
    }



    if (isset($_GET['del'])) {
        $cid = $_GET['del'];
        $sql="DELETE FROM customer WHERE cid=$cid";
        executeSQL($sql);
        $_SESSION['message'] = "customer deleted!"; 
        header('location: ../customer.php');
    }

              

    if (isset($_POST['Login'])) {

          
                $cid = $_POST['cid'];
                
                $cpassword=$_POST['cpassword'];
                
                echo $cid;

            $sql = "SELECT * FROM Customer WHERE cid = '$cid' and cpassword = '$cpassword' and cstatus='1'";
           
            $result=executeSQL($sql);
            $count = mysqli_num_rows($result);
        
        
            if($count == 1) {
         
//                $_SESSION['message']="login succesfull!";
                $_SESSION['login']="clogin";
                $_SESSION['id']=$cid;
                header("location: ../customerhome.php");
               
          }
            else { 
                
             $error = "Your Login Name or Password is invalid or account is not aproved yet";
             $_SESSION['message']=$error;
             header('location: ../customerLoginAndRegister.php');

              
            }

 
           
        }


 
     if(isset($_POST['pay'])){
    
    $tobookedseat = $_SESSION['tobookedseat'];
         $cid=$_SESSION['id'];
         $trid =$_SESSION['trid'];
         $trprice =$_SESSION['trprice'];
         $nooftickets = $_POST['nooftickets'];
         $newtobookedseat=$tobookedseat+$nooftickets;
          $toid=$_SESSION['toid'];
         $titransactionno=$_POST['titransactionno'];
         $tipaymentmethod=$_POST['tipaymentmethod'];
         $tistatus=1;
         $count=1;
     $sql="UPDATE totalbookedseatbydate SET tobookedseat='$newtobookedseat' WHERE toid=$toid";
         executeSQL($sql);
    
    echo"updated";
         while($count<=$nooftickets){
           $tobookedseat=$tobookedseat+1;
             $sql="INSERT INTO ticket (cid, trid,tiprice,tiseatno,titransactionno,tipaymentmethod,tistatus) VALUES ('$cid', '$trid','$trprice','$tobookedseat','$titransactionno','$tipaymentmethod','$tistatus')";
            executeSQL($sql);
             $count++;
         }
         
         
          $_SESSION['message']="tickets successfull done";
             header('location: ../mytickets.php');
         
         
}

 if (isset($_GET['cancel'])) {
     $tiid=$_GET['cancel'];
       $sql="UPDATE ticket SET tistatus='0' WHERE tiid=$tiid";
         executeSQL($sql);
       
       $_SESSION['message'] = "ticket canceled!"; 
        header('location: ../mytickets.php');
    }


