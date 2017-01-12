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

    $answer_id = $_POST['answer_id'];

    $sql = "SELECT explanation FROM answer WHERE answer_id = ".$answer_id.";";

    $result = $conn->query($sql);

    $data = 'error';
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $data = $row['explanation'];
        }
    }

    echo ($data);

?>