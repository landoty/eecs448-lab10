<?php 
    if(isset($_POST["user_dropdown"])) {
        $load_user = $_POST["user_dropdown"];
        unset($_POST["user_dropdown"]);
        include "./view_user_posts.html"; 
        echo "<div id=\"user-posts\"><p>$load_user</p></div>";
    }
?>