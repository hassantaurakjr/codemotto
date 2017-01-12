
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

    $answerId = $_POST['answer_id'];
    $website = $_POST['site'];
    $title = $_POST['title'];

    $output = 0;   

    $sql = "INSERT INTO resources (answer_id, website, title) VALUES (".$answerId.", '".$website."', '".$title."');";

    if ($conn->query($sql) === TRUE) {

        $output = 1;        
    }

    echo ($output);     // return 1 value as a successful response of the query otherwise failed.

    $conn->close();

?>