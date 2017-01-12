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

    $account_id = $_SESSION["selected_account_id"];

    $sql = "SELECT * FROM account WHERE account_id = ".$account_id.";";

    $result = $conn->query($sql);

    $counter = 0;
    $data = "[";
    
    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            if ($counter > 0) {
                $output .= ', ';
            }
            $data .= '{"accountId": "' . $row["account_id"] . '", ';
            $data .= '"username": "' . $row["username"] . '", ';
            $data .= '"password": "' . $row["password"] . '", ';
            $data .= '"email": "' . $row["email"] . '", ';
            $data .= '"avatar": "' . $row["avatar"] . '", ';
            $data .= '"type": "' . $row["type"] . '"}';
            $counter++;
        }
    }

    $data .= "]";

    echo ($data);

?>