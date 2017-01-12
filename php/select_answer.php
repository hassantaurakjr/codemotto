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

    $discussion_id = $_POST['discussion_id'];

    $sql = "SELECT * FROM answer WHERE discussion_id = ".$discussion_id.";";

    $result = $conn->query($sql);

    $counter = 0;
    $data = "[";
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($counter > 0) {
                $output .= ', ';
            }
            $data .= '{"discussionId": "' . $row["discussion_id"] . '", ';
            $data .= '"answerId": "' . $row["answer_id"] . '", ';
//            $data .= '"explanation": "' . $row["explanation"] . '", ';
//            $data .= '"actualCode": "' . $row["actual_code"] . '", ';
            $data .= '"addedBy": "' . $row["added_by"] . '", ';
            $data .= '"timeAdded": "' . $row["time_added"] . '", ';
            $data .= '"votesCounter": "' . $row["votes_counter"] . '"}';
            $counter++;
        }
    }

    $data .= "]";

    echo ($data);

?>