<?php
    //Create MySQL connection : url, username, password, db name
    $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
    if($mysqli->connect_errno) {
        $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
        $message = "<script> alert($message);</script>";
        echo $message;
    }
    else {
        //Need form for when admin user selects which user to view posts for
        echo "<form action=\"./view_user_posts.php\" method=\"post\">";
        //Create drop down
        echo "<label for=\"user_dropdown\">Select a user: </label>";
        echo "<select name=\"user_dropdown\" id=\"user_dropdown\">";
        //Create query string and send query
        $query = sprintf("select * from Users");
        $result = $mysqli->query($query);
        //Iterate through the results
        while($row = $result->fetch_assoc()) {
            //Add each user as an option in the dropdown
            $user = $row["user_id"];
            echo "<option value=\"$user\">$user</option>";
        }
        //End select and create input button
        echo "</select><br><br>";
        echo "<input type=\"submit\" value=\"View Posts\"></form>";
        //Clear result variable and close connection
        $result->free();
        $mysqli->close();
    }
?>