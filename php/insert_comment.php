
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

    $answer_id = $_POST['answer_id'];
    $comment = $_POST['comment'];
    $added_by = $_POST['added_by'];

    $output = 0;   

    $sql = "INSERT INTO comments (answer_id, comments, added_by, time_added) VALUES (".$answer_id.", '".$comment."', '".$added_by."', current_timestamp());";

    if ($conn->query($sql) === TRUE) {

        $output = 1;        
    }

    echo ($output);     // return 1 value as a successful response of the query otherwise failed.

    $conn->close();

?>