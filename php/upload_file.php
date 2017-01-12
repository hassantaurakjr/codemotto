<?php

session_start();

$filename = $_FILES["file"]["name"];

$temp_filename = $_FILES["file"]["tmp_name"];

$old_file = null;

$new_file = null;

$ext = '.jpg';

$output = 'error';

if (isset($filename)) {
    
    if (!empty($filename)) {
        
        $location = "../admin/user-avatar/";
        
        if (move_uploaded_file($temp_filename, $location . $filename)) {
            
            $old_file = $location . $filename;
            $new_file = $location . $_SESSION['new_username'] . $ext;
            
            if (rename($old_file, $new_file)) {
                 $output = $_SESSION['new_username'] . $ext;
            }
        }
    }
}

echo ($output);

?>