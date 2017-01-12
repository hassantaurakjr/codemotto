<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "forumdb";

    //create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    session_start();

    $discussion_id = $_SESSION['selected_discussion_id'];

    $sql = "SELECT actual_code FROM discussion WHERE discussion_id = ".$discussion_id.";";

    $result = $conn->query($sql);

    $data = 'error';
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            
            $data = $row['actual_code'];
        }
    }

    echo ($data);

?>