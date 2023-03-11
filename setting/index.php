<?php 
if (!isset($_COOKIE['userId'])) {
    header("Location: ../view/login.php?login_message=You need to login to view this page.");
}
$user_id = $_COOKIE['userId'];
require '../model/database.php';
require '../model/users_db.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        header("Location: ../index.php");
    }
}

if ($action == 'setting_list') {
    $personal_info = get_personal_info($user_id);
    include('setting_list.php');
}

else if ($action == 'change_firstname') {
    include 'edit_firstname.php';
}

else if ($action == 'submit_firstname') {
    $new_firstname = filter_input(INPUT_POST, 'first_name');
    $success = change_firstname($user_id, $new_firstname);
    header("Location: setting_list.php");
}

else if ($action == 'change_lastname') {
    include 'edit_lastname.php';
}

else if ($action == 'submit_lastname') {
    $new_lastname = filter_input(INPUT_POST, 'last_name'); 
    $success = change_lastname($user_id, $new_lastname);
    header("Location: setting_list.php");
}

else if ($action == 'change_email') {
    include 'edit_email.php';
}

else if ($action == 'submit_email') {
    $new_email = filter_input(INPUT_POST, 'email');
    $success = change_email($user_id, $new_email);
    header("Location: setting_list.php");
}

else if ($action == 'change_password') {
    include 'edit_password.php';
}

else if ($action == 'submit_password') {
    $current_password = filter_input(INPUT_POST, 'current_password');
    $new_password = filter_input(INPUT_POST, 'new_password');
    $check = check_current_password($user_id);
    if ($check['password'] = $current_password) {
        $success = change_password($user_id, $new_password);
        header("Location: edit_password.php?error=Save Successful");
    } else {
        header("Location: edit_password.php?error=Current Password Is Incorrect");
    }
}
?>