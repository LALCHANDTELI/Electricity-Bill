<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database_name="application";

// Create connection
$conn = new mysqli($servername, $username, $password,$database_name);

//echo "<pre>";
//print_r($conn);
//echo "</pre>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
echo "Connected successfully";
echo "<br/>";
$query="INSERT INTO `register` (`idr`, `name`, `password`, `mobile`, `city`, `picture`) VALUES ('4', 'gopalsecond', '4321', '4545454454', 'kota', 'gopal.jpg');";

$conn->query($query);
if($conn->query($query)){
    echo "successfully query !";
    
}else {
    echo "error";
}
*/