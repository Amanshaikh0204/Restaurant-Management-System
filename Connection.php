<?php
$connect=mysqli_connect("localhost","root","","newdb");

if(mysqli_connect_error()){
    echo "Cannot connect to Database";
    exit();
}

?>