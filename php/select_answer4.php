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

    $explanation = $_POST['explanation'];

    $sql = "SELECT answer_id FROM answer WHERE explanation = '".$explanation."';";

    $result = $conn->query($sql);

    $data = 0;
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $data = $row['answer_id'];
        }
    }

    echo ($data);

?>