function check_new_user() {
    new_user_form = document.getElementById("new_user");
    if(!new_user_form.value) {
        alert("Must enter new username");
        return false;
    }
    return true;
}

function check_new_post() {
    new_post_form = document.getElementById("create_post");
    username = new_post_form.children[1].value;
    post_body = new_post_form.children[4].value;

    if(!username) {
        alert("Must enter a username!");
        return false;
    }
    //Empty post body
    else if(!post_body) {
        alert("No empty posts!");
        return false;
    }
    //No new post, just default text from create_post.html
    else if(post_body == "Post text body...") {
        alert("Please enter a new post!");
        return false;
    }
    return true;
}

function alert_delete_posts() {
    //Checks if any posts are checked to be deleted
    inputs = document.getElementsByTagName("input")
    for(let i=0; i<inputs.length-2; i++) {
        //If any post is selected to be deleted, confirm with user
        if(inputs[i].checked) {
            if(confirm("Delete posts?")) {
                return true;
            }
            else {
                return false;
            }
        }
        else if (i==inputs.length-2) {
            alert("No posts selected");
            return false;
        }
        else {
            continue;
        }
    }
}