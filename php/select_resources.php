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

    $sql = "SELECT * FROM resources WHERE answer_id = ".$answer_id.";";

    $result = $conn->query($sql);

    $counter = 0;
    $data = "[";
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($counter > 0) {
                $data .= ', ';
            }
            $data .= '{"resourcesId": "' . $row["resources_id"] . '", ';
            $data .= '"site": "' . $row["website"] . '", ';
            $data .= '"title": "' . $row["title"] . '"}';
            $counter++;
        }
    }

    $data .= "]";

    echo ($data);

?>