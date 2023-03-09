<?php 
function logged_in () {
    if (!isset($_COOKIE['userId'])) {
        return false;
    } else {
        return true;
    }
}
?>