<?php
    
    session_start();
    
    // initialize all the sessions variables.

    $_SESSION["selected_account_id"] = 0;
    $_SESSION["selected_topic_id"] = 0;
    $_SESSION["selected_discussion_id"] = 0;
    $_SESSION["selected_comment_id"] = 0;
    $_SESSION['selected_answer_id'] = 0;

    $_SESSION["new_email"] = null;  
    $_SESSION["new_username"] = null;
    $_SESSION["new_password"] = null;
    $_SESSION["new_gender"] = null;
    $_SESSION["new_avatar"] = null;

    $output = 'success';
    
    echo($output);

?>