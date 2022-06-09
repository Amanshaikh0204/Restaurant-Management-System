<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form</title>
      <link rel="stylesheet" href="style1.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            
            <div class="title login">
               Login
            </div>
            <div class="title signup">
               Signup
              
            </div>
         </div>
         
         
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="validation.php" method="post" class="login">
                  <div class="field">
                     <input type="email" name="email" id="email" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
          
                  </div>
                   
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  
                  <div class="pass-link">
                     <input type="checkbox" id="remember-me">
                     <label for="remember-me">Remember Me</label>
                     <a href="http://localhost/myregistration/forgotpass.php">Forgot Password?</a>
                    </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="fsave" value="login">
                  </div>
                  <div class="signup-link">
                     New User? <a href="">Signup now</a>
                  </div>
                  <br>
                  <?php
              if(isset($_SESSION['status']))
            {
               echo $_SESSION['status'];
               unset($_SESSION['status']);
            } else if(isset($_SESSION['example']))
            {
               echo $_SESSION['example'];
               unset($_SESSION['example']);
            } else if(isset($_SESSION['your'])){
               
               echo $_SESSION['your'];
               unset($_SESSION['your']);
            } 
            else if(isset($_SESSION['my']))
            {
               echo $_SESSION['my'];
               unset($_SESSION['my']);
            } 
            ?>
               </form>
               <form action="details.php" method="POST">
                  <div class="field">
                     <input type="text" name="name" placeholder="Full Name" required>
                  </div>
                  <div class="field">
                     <input type="text" name="phone" placeholder="Phone Number" pattern="[1-9]{1}[0-9]{9}" title="Number must be of 10 digits" required>
                  </div>
                  <div class="field">
                     <input type="email" name="email" id="email" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                  </div>
                  <div class="field">
                     <input type="password" name="confirm_password" placeholder="Confirm password" id="confirm_password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="save" id="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
           
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
        
      </script>
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords didn't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

   </body>
</html>
