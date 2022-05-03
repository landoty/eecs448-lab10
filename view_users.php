<?php 
    //Create table and headers
    echo "<table id=\"users_table\"><tr><td><strong>Username</strong></td></tr>";
    //Create MySQL connection : url, username, password, db name
    $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
    //Check if an error occured when connecting
    if($mysqli->connect_errno) {
        $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
        $message = "<script> alert($message)</script>";
        echo $message;
    }
    else {
        //Create query string and send
        $query = sprintf("select * from Users");
        $result = $mysqli->query($query);
        //Iterate through results and add table row
        while($row = $result->fetch_assoc()) {
            $user = $row["user_id"];
            echo "<tr><td>$user</td></tr>";
        }
        //End table, free result and close connection
        echo "</table>";
        $result->free();
        $mysqli->close();
    }
?>