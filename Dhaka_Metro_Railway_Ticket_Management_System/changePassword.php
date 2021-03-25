<?php  
session_start();
if (!isset($_SESSION['login'])) {
  header("Location:customerloginAndregister.php");
}
?>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style/liststyle.css">
    <link rel="stylesheet" type="text/css" href="style/downformstyle.css">
    <link rel="stylesheet" type="text/css" href="style/homeStyle.css">
    </head>
<body>
    <?php
        if($_SESSION["login"]=="alogin"){
          include('adminHeader.php');
        }
        else if($_SESSION["login"]=="clogin"){
          include('customerHeader.php');   
        }
        else {
          include('ticketclerkHeader.php');
        }
    ?>


     <div class="loginbox">
         <!-- <h1>Change Password </h1> -->
    <?php if (isset($_SESSION['message'])): ?>
    
      <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                
                unset($_SESSION['message']);
            ?>
        </div>



    <?php endif ?>
    
    <div class="container3">
    <div class="forms-container">
        <div class="signin-signup">
        
        <form method="post" name="chngpwd" onsubmit="return valid()" action="service/changePasswordService.php" class="sign-in-form">
        <label><h2>Change Password </h2></label><br>
            
            <label>Old Password :</label>
            <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="opwd" id="opwd" required>
            </div>
           
            <label>New Passowrd :</label>
            <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="npwd" id="npwd" required>
            </div>
            
            <label>Confirm Password :</label>
            <div class="input-field">
            <i class="fas fa-lock"></i>
           <input type="password" name="cpwd" id="cpwd" required>
           </div>
            
            <input class="btn slid" type="submit" name="Change" value="Change" />
           
         
            
        </form>
        </div>
    </div> 
</div>



    </div>
  <script type="text/javascript">
        function valid()
        {
        
        if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cpwd.focus();
        return false;
        }

        



        return true;
        }
</script>
</body>
    
    

</html>