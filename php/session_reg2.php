<?php

    session_start();

    $_SESSION['new_avatar'] = $_POST['avatar'];

    $output = 'error';

    if ($_SESSION['new_avatar'] != null) {
        $output = 'success';
    }

    echo($output);

?>