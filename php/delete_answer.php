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

    $answer_id = $_POST["answer_id"];

    $sql = "DELETE FROM resources WHERE answer_id = ". $answer_id;

    $data = 'error';
    
    if ($conn->query($sql) === TRUE) {

        $sql = "DELETE FROM comments WHERE answer_id = ". $answer_id;
        
        if ($conn->query($sql) === TRUE) {

            $sql = "DELETE FROM answer WHERE answer_id = ". $answer_id;
            
            if ($conn->query($sql) === TRUE) {
                
                $data = 'success';
            }
        }
    }

    echo ($data);

?>