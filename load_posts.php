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
        echo "<form id=\"delete_posts\" method=\"post\">";
        //Create table and headers
        echo "<table id=\"post_table\"><tr><th>Content</th><th>Author</th><th>Delete</th></tr>";
        //Get post id, author id, and content from Posts table but only show user content and author. Use post id for form name
        $query = sprintf("select * from Posts");
        $result = $mysqli->query($query);
        while($row = $result->fetch_assoc()) {
            $content = $row["content"];
            $author = $row["author_id"];
            $id = $row["post_id"];
            //Post content and author
            echo "<tr><td>$content</td><td>$author</td>";
            //Add checkbox with post id as name
            echo "<td><input type=\"checkbox\" name=\"$id\"></td></tr>";
        }
        echo "</table><br><br>";
        echo "<input type=\"submit\" value=\"Delete Posts\" onclick=\"return alert_delete_posts()\">";
        echo "</form>";
        $result->free();
        $mysqli->close();
    }
?>