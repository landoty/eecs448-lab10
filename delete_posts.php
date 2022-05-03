<?php
    //Delete from Posts where id=x or id=x or id=x...
    $query = sprintf("delete from Posts where ");
    $x = 1;
    $length = count($_POST);
    $message = "<script>alert(\"Post(s): ";
    //Append the delete query for each id to be deleted
    foreach($_POST as $id => $status) {
        //Append different for the last id to be deleted
        if($x === $length) {
            $query .= sprintf("post_id=%d", $id);
            $message .= sprintf("%s deleted\");</script>", $id);
        }
        else {
            $query .= sprintf("post_id=%d or ", $id);
            $message .= sprintf("%s, ", $id);
        }
        unset($_POST[$id]);
        $x++;
    }
    //Note that there is no need to check no id's are selected as that is handled client-side
    //Create MySQL connection : url, username, password, db name
    $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
    //Check if an error occured when connecting
    if($mysqli->connect_errno) {
        $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
        $message = "<script> alert(\"$message\")</script>";
    }
    else {
        $mysqli->query($query);
        $mysqli->close();
    }
    include "./delete_post.html";
    echo $message;
?>