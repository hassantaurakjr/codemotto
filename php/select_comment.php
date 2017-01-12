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

    $answer_id = $_POST['answer_id'];

    $sql = "SELECT * FROM comments WHERE answer_id = ".$answer_id.";";

    $result = $conn->query($sql);

    $counter = 0;
    $data = "[";
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($counter > 0) {
                $data .= ', ';
            }
            $data .= '{"commentId": "' . $row["comments_id"] . '", ';
            $data .= '"comment": "' . $row["comments"] . '", ';
            $data .= '"addedBy": "' . $row["added_by"] . '", ';
            $data .= '"timeAdded": "' . $row["time_added"] . '"}';
            $counter++;
        }
    }

    $data .= "]";

    echo ($data);

?>