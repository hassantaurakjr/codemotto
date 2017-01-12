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

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM account WHERE username = '".$username."';";

    $result = $conn->query($sql);

    $account_id = -1;     // Means .. Username not found.
    
    if ($result->num_rows > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            
            if ($password == $row['password']) {
                
                $sql2 = "SELECT account_id FROM account WHERE username = '".$username."' AND password = '".$password."';";
        
                $result2 = $conn->query($sql2);
                
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    
                    $account_id = $row2["account_id"];       // Means .. Account does exist.       
                }
            }
            else {
                $account_id = 0;       // Means .. Password not found.
            }
        }
    }

    echo ($account_id);

?>