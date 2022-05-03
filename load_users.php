<?php
    //Need form for when admin user selects which user to view posts for
    echo "<form action=\"./view_user_posts.php\" method=\"post\">";
    //Create drop down
    echo "<label for=\"user_dropdown\">Select a user: </label>";
    echo "<select name=\"user_dropdown\" id=\"user_dropdown\">";
    //Create MySQL connection : url, username, password, db name
    $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
    //Test options. When mysql is available, query and populate this list
    if($mysqli->connect_errno) {
        $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
        $message = "<script> alert($message)</script>";
        echo $message;
    }
    else {
        $query = sprintf("select * from Users");
        $result = $mysqli->query($query);
        while($row = $result->fetch_assoc()) {
            $user = $row["user_id"];
            echo "<option value=\"$user\">$user</option>";
        }
        echo "</select><br><br>";
        $result->free();
        $mysqli->close();
    }
    //Submit
    echo "<input type=\"submit\" value=\"View Posts\"></form>";
?>