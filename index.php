<?php 
session_start();
require('model/database.php');
require 'model/users_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        if (!isset($_COOKIE['userId'])) {
            header("Location: view/login.php");
        } else {
            header("Location: view/menu.php");
        }    
    } else if ($action == 'signup') {
        include 'view/signup.php';
    } 
}

else if ($action == 'login') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $user = get_user($email, $password);
    if ($user != false) {
        $cookie_userid = 'userId';
        $userid_value = $user['userId'];

        $cookie_firstname = 'FirstName';
        $firstname_value = $user['FirstName'];

        $expire = strtotime('+1 year');
        $path = '/';

        setcookie($cookie_userid, $userid_value, $expire, $path);
        setcookie($cookie_firstname, $firstname_value, $expire, $path);

        header("Location: view/menu.php");
    } else {
        header("Location: view/login.php?login_message=Incorrect Login Credentials");
    }
}

else if ($action == 'logout') {
    $expire = strtotime('-1 year');
    setcookie('userId', '', $expire, '/');
    header("Location: .");
} 

else if ($action == 'check_signup') {
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $success = add_user($email, $password, $first_name, $last_name);
    if ($success == true) {
        header("Location: view/login.php?login_message=You have been successfully signed up. Please login.");
    } else {
        header("Location: view/login.php?login_message=Sign up error. Try again later.");
    }
}

?>

