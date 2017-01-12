
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

    $topic_id = $_POST['topic_id'];
    $discussion = $_POST['discussion'];
    $explanation = $_POST['explanation'];
    $code = $_POST['code'];
    $added_by = $_POST['posted_by'];

    $output = 0;   

    $sql = "INSERT INTO discussion (topic_id, discussion, explanation, actual_code, added_by, time_added) VALUES (".$topic_id.", '".$discussion."', '".$explanation."', '".$code."', '".$added_by."', current_timestamp());";

    if ($conn->query($sql) === TRUE) {

        $output = 1;        
    }

    echo ($output);     // return 1 value as a successful response of the query otherwise failed.

    $conn->close();

?>