<?php
    if(isset($_POST["new_user"])) {
        $new_user = $_POST["new_user"];
        unset($_POST["new_user"]);
        //Create MySQL connection : url, username, password, db name
        $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
        //Check if an error occured when connecting
        if($mysqli->connect_errno) {
            $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
            $message = "<script> alert($message)</script>";
        }
        else {
             //Insert query will return false if the user already exists
            $query = sprintf("insert into Users values ('%s')", $new_user);
            $result = $mysqli->query($query);
            if($result) { 
                $message = "<script>alert(\"User: $new_user created\")</script>";
            }
            else {
                $message = "<script>alert(\"User: $new_user already exists\")</script>";
            }
        }
    $mysqli->close();
    }
     
    //Render the create user page and echo out the alert
    include "./create_user.html";
    echo $message;
?>