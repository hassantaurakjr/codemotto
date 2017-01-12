
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
$explanation = $_POST['explanation'];
$actual_code = $_POST['code'];
$added_by = $_POST['posted_by'];

$data = 'error';   

$sql = "INSERT INTO answer (discussion_id, explanation, actual_code, added_by, time_added) VALUES (".$discussion_id.", '".$explanation."', '".$actual_code."', '".$added_by."', current_timestamp());";

if ($conn->query($sql) === TRUE) {
    
    $sql = "SELECT COUNT(discussion_id) FROM answer WHERE discussion_id = ".$discussion_id;
    
    $data = 'error1';
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            
            $sql = "UPDATE discussion SET answers_counter = ".$row['COUNT(discussion_id)']." WHERE discussion_id = ".$discussion_id;
            
            $data = 'error2';
            
            if ($conn->query($sql) === TRUE) {
                
                $data = 'success';   
            }       
        }
    }        
}

echo ($data);

$conn->close();

?>