<?php
    session_start();
    require "db.php";

if($_SESSION["login"]=="alogin"){
    if (isset($_POST['Change'])) {
        $aid = $_SESSION['id'];
        $apassword=$_POST['opwd'];
        $apasswordNew=$_POST['npwd'];
        
        $sql = "SELECT * FROM admin WHERE aid = '$aid' and apassword = '$apassword' ";
        $result=executeSQL($sql);
        $count = mysqli_num_rows($result);
    
    
        if($count == 1) {
        $sql="UPDATE admin SET apassword='$apasswordNew' WHERE aid=$aid";
        executeSQL($sql);
        $_SESSION['message'] = "Login with your new password"; 
        header('location: ../logout.php');
        
        }

    

      else { 
        $error = "wrong Password";
        $_SESSION['message']=$error;
        header('location: ../changePassword.php');
        
    }
}

    
}

else if($_SESSION["login"]=="clogin"){

        if (isset($_POST['Change'])) {
            $cid = $_SESSION['id'];
            $cpassword=$_POST['opwd'];
            $cpasswordNew=$_POST['npwd'];
            
            $sql = "SELECT * FROM Customer WHERE cid = '$cid' and cpassword = '$cpassword' and cstatus='1'";
            $result=executeSQL($sql);
            $count = mysqli_num_rows($result);
        
        
            if($count == 1) {
            $sql="UPDATE customer SET cpassword='$cpasswordNew' WHERE cid=$cid";
            executeSQL($sql);
            $_SESSION['message'] = "Login with your new password"; 
            header('location: ../logout.php');
            
            }
    
        

                else { 
                $error = "wrong Password";
                $_SESSION['message']=$error;
                header('location: ../changePassword.php');
                
            }


        }
  
}
else {
    // unset($_SESSION["id"]);
    // unset($_SESSION["login"]);


    if (isset($_POST['Change'])) {
        $tid = $_SESSION['id'];
        $tpassword=$_POST['opwd'];
        $tpasswordNew=$_POST['npwd'];
        
        $sql = "SELECT * FROM ticketclerk WHERE tid = '$tid' and tpassword = '$tpassword' ";
        $result=executeSQL($sql);
        $count = mysqli_num_rows($result);
    
    
        if($count == 1) {
        $sql="UPDATE ticketclerk SET tpassword='$tpasswordNew' WHERE tid=$tid";
        executeSQL($sql);
        $_SESSION['message'] = "Login with your new password"; 
        header('location: ../logout.php');
        
        }

    

            else { 
            $error = "Wrong Password";
            $_SESSION['message']=$error;
            header('location: ../changePassword.php');
            
        }


    }
    
}
  















?>