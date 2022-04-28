function check_new_user() {
    new_user_form = document.getElementById("new_user");
    if(!new_user_form.value) {
        alert("Must enter new username");
        return false;
    }
    return true;
}