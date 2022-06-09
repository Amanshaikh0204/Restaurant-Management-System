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

if(isset($_POST['save']))
{	
	 $name = $_POST['name'];
	 $phone = $_POST['phone'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $confirm_password = $_POST['confirm_password'];


	 $sql_query = "INSERT INTO usertable (name,phone,email,password,confirm_password)
	 VALUES ('$name','$phone','$email','$password','$confirm_password')";

	 $select = mysqli_query($conn, "SELECT * FROM usertable WHERE email = '".$_POST['email']."'");
	 if(mysqli_num_rows($select)) {
		$_SESSION['example'] = "<p align='center'> <font color=red> This Email Already Exists</font> </p>";
		header('location: login2.php');
		 
	 }

	 if (mysqli_query($conn, $sql_query)) 
	 {
		$_SESSION['status'] =  "<p align='center'> <font color=red> User Created Successfully ! Now Login</font> </p>";
		header('location: login2.php');
		
		
	 } 
	 else if (mysqli_num_rows($select))
	  {
		echo "<p align='center'> <font color=red> This Email Already Exists</font> </p>";
	    
	}
    else {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
