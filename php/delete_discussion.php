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

    $discussion_id = $_POST["discussion_id"];

    $sql = "DELETE FROM discussion WHERE discussion_id = ". $discussion_id;

    $result = $conn->query($sql);

    $data = 'error';
    
    if ($conn->query($sql) === TRUE) {

        $data = 'success';        
    }

    echo ($data);

?>