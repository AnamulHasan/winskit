<?php

function user_exists($username){
    global $db;
    $query=$db->query("select count(`user_id`) from `users` where `user_name`='$username'");
    list($que)=$query->fetch_row();
    return ($que==1)?true:false;
}

function output_errors($errors){
    foreach($errors as $error){
        echo "<span class='text-danger'>";
        echo $error;
        echo "</span><br/>";
    }
}