
<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "furom";

    //create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $category = $_POST["category"];
    $added_by = $_POST["added_by"];
    $time_added = $_POST["time_added"];

    $output = 0;   

    $sql = "INSERT INTO category ('category', 'added_by', 'time_added') VALUES ('".$category."', '".$added_by."', '".$time_added."');";

    if ($conn->query($sql) === TRUE) {

        $output = 1;        
    }

    echo ($output);     // return 1 value as a successful response of the query otherwise failed.

    $conn->close();

?>