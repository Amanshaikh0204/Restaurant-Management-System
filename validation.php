<?php
session_start();
$server_name="localhost";
$username="root";
$password="";
$database_name="newdb";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

$email = $_POST['email'];
$password = $_POST['password'];

$s = "select * from usertable where email = '$email' && password = '$password'";
$r = "select * from usertable where email = '$email' && password  != '$password'";

$result = mysqli_query($conn,$s);
$result1 = mysqli_query($conn,$r);



$num = mysqli_num_rows($result);
$num1 = mysqli_num_rows($result1);



if ($num == 1){
   $_SESSION['abc'] = "<p align='left'> <font color=FF3366> Welcome " .$email."</font> </p><font size='4pt'><a href=logout.php>LOGOUT</a></font></p>";
   header('location: index.php');
}
else if($num1 ==1) {
   $_SESSION['your'] = "<p align='center'> <font color=red> Invalid Email Or Password !</font> </p>";
   header('location: login2.php');
}

else  {
    $_SESSION['my'] = "<p align='center'> <font color=red> User Doesn't Exists! Please Signup First</font> </p>";
		header('location: login2.php');
    
}