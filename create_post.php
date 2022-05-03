<?php
    //Checking post variables
    if(isset($_POST["username"]) && isset($_POST["post_body"])) {
        //Setting local variables and unsetting the form data
        $user = $_POST["username"];
        $post_body = $_POST["post_body"];
        unset($_POST["username"]);
        unset($_POST["post_body"]);
        //Create MySQL connection : url, username, password, db name
        $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
        //Check if an error occured when connecting
        if($mysqli->connect_errno) {
            $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
            $message = "<script> alert(\"$message\")</script>";
        }
        //Check if user exists
        $query = sprintf("select user_id from Users where user_id='%s'", $user);
        $result = $mysqli->query($query);
        $row = $result->fetch_assoc();
        //User does not exist
        if($row["user_id"] == "") {
            $message = "<script> alert(\"Cannot post. User: $user does not exist.\")</script>";
            $result->free();
        }
        else {
            $query = sprintf("insert into Posts (content, author_id) values ('%s', '%s')", $post_body, $user);
            $mysqli->query($query);
            $message = "<script> alert(\"Post created!\")</script>";
        }
        $mysqli->close();
    }
    include "./create_post.html";
    echo $message;
?>