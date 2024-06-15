<?php
$servername ="localhost";
$username = "root";
$password ="";
$dbname = "mydb";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn){
    // echo "Connected!!";
}
else{
    echo "Connection failed".mysqli ->connect_error;
}

?>