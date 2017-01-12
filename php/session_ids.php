<?php

    session_start();
    
    $trigger_function = $_POST["trigger_function"];
    $selected_id = $_POST["selected_id"];
    
    // provide getter and setter for all the sessions variables depends on selected trigger function.

    if ($trigger_function == "set_account_id") {
        $_SESSION["selected_account_id"] = $selected_id;
        echo($selected_id);
    }
    
    else if ($trigger_function == "set_topic_id") {
        $_SESSION["selected_topic_id"] = $selected_id;
        echo ($selected_id);
    }
    
    else if ($trigger_function == "set_discussion_id") {
        $_SESSION['selected_discussion_id'] = $selected_id;
        echo ($selected_id);
    }
    
    else if ($trigger_function == "set_comment_id") {
        $_SESSION["selected_comment_id"] = $selected_id;
        echo ($selected_id);
    }
    
    else if ($trigger_function == 'set_answer_id') {
        $_SESSION["selected_answer_id"] = $selected_id;
        echo ($selected_id);
    }

    else if ($trigger_function == "get_account_id") {
        echo ($_SESSION["selected_account_id"]);  
    }

    else if ($trigger_function == "get_topic_id") {
        echo ($_SESSION["selected_topic_id"]);
    }
    
    else if ($trigger_function == "get_discussion_id") {
        echo ($_SESSION["selected_discussion_id"]);   
    }
    
    else if ($trigger_function == "get_comment_id") {
        echo ($_SESSION["selected_comment_id"]);
    }

    else if ($trigger_function == 'get_answer_id') {
        echo ($_SESSION["selected_answer_id"]);
    }

    else {
        echo (0);
    }

?>