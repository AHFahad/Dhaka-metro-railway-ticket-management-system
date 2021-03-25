<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style/customerloginStyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form method="post" action="service/AdminService.php" class="sign-in-form">
            <h2 class="title">Sign in</h2>


            <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php 
                    echo $_SESSION['message']; 
                    
                    unset($_SESSION['message']);
                ?>
            </div>
            <?php endif ?> 



            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="aid" placeholder="ID" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="apassword" placeholder="Password" required/>
            </div>
            <input type="submit" value="Login" name="Login" class="btn solid" />
            

            
            
           
          </form>


         

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Login To Admin penel</h3>
            <p>
              Bangladesh first metro railway system.
            </p>
            <a href="customerLoginAndRegister.php"><button class="btn transparent">Go back</button></a>
          </div>
          <img src="img/train.png" class="image" alt="train" />
       
    </div>

    <script >
       
    </script>
  </body>
</html>
