
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forumdb";

//create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

session_start();

$email = $_SESSION["new_email"];
$username = $_SESSION["new_username"];
$password = $_SESSION["new_password"];
$gender = $_SESSION["new_gender"];
$avatar = $_SESSION["new_avatar"];

$output = 0;   

$sql = "INSERT INTO account (email, username, password, gender, avatar) VALUES ('".$email."', '".$username."', '".$password."', '".$gender."', '".$avatar."');";

if ($conn->query($sql) === TRUE) {
    
    $output = 1;        
}

echo ($output);     // return 1 value as a successful response of the query otherwise failed.

$conn->close();

?>