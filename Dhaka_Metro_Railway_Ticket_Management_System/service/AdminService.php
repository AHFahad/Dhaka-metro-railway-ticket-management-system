<?php 
session_start();
require "db.php";
if (isset($_POST['Login'])) {

          
                $aid = $_POST['aid'];
                
                $apassword=$_POST['apassword'];
                

            $sql = "SELECT * FROM Admin WHERE aid = '$aid' and apassword = '$apassword'";
           
            $result=executeSQL($sql);
            $count = mysqli_num_rows($result);
        
        
            if($count >= 1) {
         
//                $_SESSION['message']="login succesfull!";
                $_SESSION['login']="alogin";
                $_SESSION['id']=$aid;
                header("location: ../adminhome.php");
               
          }
            else { 
                
             $error = "Your Login Name or Password is invalid".$aid.$apassword.$count;
             $_SESSION['message']=$error;
             header('location: ../adminLogin.php');

              
            }

        
        
        

           
        }