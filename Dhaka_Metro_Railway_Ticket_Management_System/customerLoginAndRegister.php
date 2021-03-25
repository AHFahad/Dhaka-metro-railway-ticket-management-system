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
    <link rel="stylesheet" href="Style/customerLoginStyle.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">


        
        


          <form method="post" action="service/customerService.php" class="sign-in-form">
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
              <input type="text" name="cid" placeholder="ID" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="cpassword" placeholder="Password" required/>
            </div>
            <input type="submit" name="Login" value="login" class="btn solid" />
           

            
          </form>

          






          <form method="post" action="service/customerService.php" class="sign-up-form">
            <h2 class="title">Sign up</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text"  name="cname" placeholder="Name" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-address-card"></i>
              <input type="text"  name="caddress" placeholder="Adress" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email"  name="cemail" placeholder="Email" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-mobile-alt"></i>
              <input type="text"  name="cmobile" placeholder="Mobile Number" required/>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  name="cpassword" placeholder="Password" required/>
            </div>

            <div>
                <label text-align: left >Date of birth</label>
            </div>
            <div class="input-field">
            
              <i class="fas fa-calendar"></i>
              <input type="date"  name="cdob" placeholder="date of birth" required/>
            </div>

            <input type="submit" class="btn" name="signup" value="Sing Up" required/>
            
           
          </form>

        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Don't have an account?</h3>
            <p>
              Then Register your account to Bangladesh first metro railway system.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
                <br>


            <a id="linkL"class="buttonL" href="AdminLogin.php"><button class="btn transparent " id="linkR">Admin login panel</button></a>
            <a class="buttonR" href="TicketClerkLogin.php"><button class="btn transparent ">Ticket clerk login penel</button></a>






          </div>
          <img src="img/train.png" class="image" alt="train" />
        </div>
        <div class="panel right-panel">

          
          <div class="content">
            <h3>Already have an account?</h3>
            <p>
              Then login to bangladesh first metro railway system.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/signup.svg" class="image" alt="signup" />
        </div>
      </div>
    </div>

    <script >
          const sign_in_btn = document.querySelector("#sign-in-btn");
          const sign_up_btn = document.querySelector("#sign-up-btn");
          const container = document.querySelector(".container");

          sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
          });

          sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
          });
    </script>
  </body>
</html>
