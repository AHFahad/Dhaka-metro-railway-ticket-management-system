<?php  
session_start();
?>
<html>
<head>
<title>Login Form Design</title>
    <link rel="stylesheet" type="text/css" href="style/loginStyle.css">
<body>
     <div class="loginbox">
         <h1>Customer Login</h1>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php 
                echo $_SESSION['message']; 
                
                unset($_SESSION['message']);
            ?>
        </div>
    
    <?php endif ?>
    
        
        <form method="post" action="service/customerService.php">
            <p>ID:</p>
            <input type="text" name="cid" >
            <p>Password:</p>
            <input type="password" name="cpassword" >
            <input type="submit" name="Login" >
            
            <a href="CustomerRegistrationForm.php">Don't have an account?</a><br>
            <a href="AdminLogin.php">Admin</a><br>
            <a href="TicketClerkLogin.php">ticket clerk</a>
        </form>
        
    </div>

</body>
</head>
</html>