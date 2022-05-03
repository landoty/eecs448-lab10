<?php
    //Check if user dropdown has a selection
    if(isset($_POST["user_dropdown"])) {
        //load local variables and unset post data
        $load_user = $_POST["user_dropdown"];
        unset($_POST["user_dropdown"]);
        //Render view user posts page before creating table
        include "./view_user_posts.html";
        //Create MySQL connection : url, username, password, db name
        $mysqli = new mysqli("mysql.eecs.ku.edu", "l371d072", "boCh3quo", "l371d072");
        if($mysqli->connect_errno) {
            $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
            //Insert alert if error in connection
            $message = "<script> alert($message)</script>";
            echo $message;
        }
        else {
            //Create query string and send
            $query = sprintf("select post_id, content from Posts where author_id='%s'", $load_user);
            $result = $mysqli->query($query);
            //Display which user's posts are being displayed and create table
            echo "<h2>User: $load_user</h2>";
            echo "<div id=\"landing_page\">";
            echo "<table id=\"user_posts\"><tr><th>Post ID</th><th>Content</th></tr>";
            //Iterate through results and add table rows
            while($row = $result->fetch_assoc()) {
                $post_id = $row["post_id"];
                $content = $row["content"];
                echo "<tr><td>$post_id</td><td>$content</td></tr>";
            }
            //End table, clear results, and close connection
            echo "</table></div>";
            $result->free();
            $mysqli->close();
        }
    }
?>