<?php require("Connection.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin Login Page</title>
      <link rel="stylesheet" href="style2.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Admin Login
         </div>
         <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <div class="field">
               <input type="text" name="AdminName" required>
               <label>Admin Credential</label>
            </div>
            <div class="field">
               <input type="password" name="AdminPass" required>
               <label>Password</label>
            </div>
            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" name="Login" value="Login">
            </div>
           
         </form>
      </div>
      <?php 

     function input_filter($data)
     {
      $data=trim($data);
      $data=stripslashes($data);
      $data=htmlspecialchars($data);
      return $data;
     }
     
      if(isset($_POST['Login']))
      {
         
          $AdminName=input_filter($_POST['AdminName']);
          $AdminPass=input_filter($_POST['AdminPass']);

          $AdminName=mysqli_real_escape_string($connect,$AdminName);
          $AdminPass=mysqli_real_escape_string($connect,$AdminPass);

          $query="SELECT * FROM `admin_login` WHERE `Admin_Name`=? AND `Admin_Password`=?";

          if($stmt=mysqli_prepare($connect,$query))
          {
             mysqli_stmt_bind_param($stmt,"ss",$AdminName,$AdminPass);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             if(mysqli_stmt_num_rows($stmt)==1)
             {
                session_start();
                $_SESSION['AdminLoginId']=$AdminName;
                header("location: AdminPanel.php");
             }
             else{
                echo "<script>alert('Invalid Admin Name Or Password');</script>";
             }
             mysqli_stmt_close($stmt);
          }
          else
          {
            echo "<script>alert('SQL Query Cannot be prepared');</script>";
            
          }
      }
      ?>
   </body>
</html>