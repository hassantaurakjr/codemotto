
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

$discussion_id = $_SESSION['selected_discussion_id'];

$data = 0;   

$sql = "SELECT views_counter FROM discussion WHERE discussion_id = ".$discussion_id;

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        
        $views_counter = $row['views_counter']  + 1;
        
        $sql = "UPDATE discussion SET views_counter = ".$views_counter." WHERE discussion_id = ".$discussion_id;

        $data = 0;

        if ($conn->query($sql) === TRUE) {

            $data = 1;   
        }       
    }
} 

echo ($data);

$conn->close();

?>