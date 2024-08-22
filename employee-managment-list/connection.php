<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){

    // echo "Connection succesfully connected ". $dbname;
}

else{
    die("Not connected <br>".mysqli_connect_error());
}
?>