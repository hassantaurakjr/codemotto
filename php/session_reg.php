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

    $_SESSION["new_email"] = $_POST["new_email"];
    $_SESSION["new_username"] = $_POST["new_username"];
    $_SESSION["new_password"] = $_POST["new_password"];
    $_SESSION["new_gender"] = $_POST["new_gender"];

    $data = 'error';

    if (!filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL)) {
        $data = 'invalid-email';
    }
    else {
        
        $sql = "SELECT * FROM ACCOUNT WHERE username = '".$_POST['new_username']."'";
        
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $data = 'conflict-username';
            }
        }
        
        if ($data != 'conflict-username') {
            if ($_SESSION["new_email"] != null &&
                $_SESSION["new_username"] != null &&
                $_SESSION["new_password"] != null &&
                $_SESSION["new_gender"] != null) {

                $data = 'success';
            }    
        }  
    }
        
    echo($data);

?>