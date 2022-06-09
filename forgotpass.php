<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname = "newdb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
 die('Could not Connect My Sql:' .mysqli_connect_error());
}
if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $res = mysqli_query($conn,"SELECT * FROM usertable where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($res);
	$fetch_email=$row['email'];
	$email=$row['email'];
	$password=$row['password'];
	if($email==$fetch_email) {
				$to = $email;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: password@myrestaurent.com" . "\r\n" .
                "CC: ashaikh34987@gmail.com";
                if (mail($to,$subject,$txt,$headers)){
                echo "<p align='center'> <font color=red size='6pt'> Password Successfully Sent To Your Email ! Please Check</font> </p>";
			}
    else{
		echo "User Doesn't Exist";
				}
}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Retrieve Your Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Enter Your Email:</td><td><input type='email' name='email' required/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>


