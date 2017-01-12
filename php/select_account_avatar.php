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

    $username = $_POST['username'];

    $sql = "SELECT avatar FROM account WHERE username = '".$username."';";

    $result = $conn->query($sql);

    $counter = 0;
    $data = 'error';
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $data = $row['avatar'];
        }
    }

    echo ($data);

?>