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

    $sql = "SELECT * FROM topic;";

    $result = $conn->query($sql);

    $counter = 0;
    $data = "[";
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($counter > 0) {
                $data .= ', ';
            }
            $data .= '{"topicId": "' . $row["topic_id"] . '", ';
            $data .= '"topic": "' . $row["topic"] . '", ';
            $data .= '"addedBy": "' . $row["added_by"] . '", ';
            $data .= '"timeAdded": "' . $row["time_added"] . '", ';
            $data .= '"discussionCounter": "' . $row["discussion_counter"] . '"}';
            $counter++;
        }
    }

    $data .= "]";

    echo ($data);

?>