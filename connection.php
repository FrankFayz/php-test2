<?php
$servername = "localhost";
$username_db = "root";
$password_db = "";
$db_name = "transport";
$connection=mysqli_connect($servername, $username_db, $password_db, $db_name);
if($connection) {
    echo"Connected successfully";
}
if(!$connection){
    die("coonection failed".mysqli_connect_error());
}
?>